<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Stripe\StripeClient;
use Stripe\Webhook;

class DonationController extends Controller
{
    public function show()
    {
        return view('pages.donate', [
            'amounts' => config('fuel4kids.donation_amounts'),
        ]);
    }

    /**
     * Create a Stripe Checkout session and redirect the donor to Stripe.
     */
    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:1', 'max:999999'],
            'frequency' => ['required', 'in:once,monthly'],
            'name' => ['nullable', 'string', 'max:120'],
            'email' => ['nullable', 'email', 'max:190'],
        ]);

        $amountCents = (int) round($validated['amount'] * 100);
        $currency = config('services.stripe.currency', 'cad');
        $isMonthly = $validated['frequency'] === 'monthly';

        $donation = Donation::create([
            'uuid' => (string) Str::uuid(),
            'name' => $validated['name'] ?? null,
            'email' => $validated['email'] ?? null,
            'amount' => $amountCents,
            'currency' => $currency,
            'frequency' => $validated['frequency'],
            'status' => 'pending',
        ]);

        $stripe = new StripeClient(config('services.stripe.secret'));

        $priceData = [
            'currency' => $currency,
            'unit_amount' => $amountCents,
            'product_data' => [
                'name' => $isMonthly
                    ? 'Monthly donation — Fuel4Kids Organization'
                    : 'Donation — Fuel4Kids Organization',
            ],
        ];

        if ($isMonthly) {
            $priceData['recurring'] = ['interval' => 'month'];
        }

        $params = [
            'mode' => $isMonthly ? 'subscription' : 'payment',
            'line_items' => [[
                'price_data' => $priceData,
                'quantity' => 1,
            ]],
            'metadata' => ['donation_id' => $donation->uuid],
            'success_url' => route('donate.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('donate.cancel'),
        ];

        if (! $isMonthly) {
            $params['submit_type'] = 'donate';
        }

        if (! empty($validated['email'])) {
            $params['customer_email'] = $validated['email'];
        }

        try {
            $session = $stripe->checkout->sessions->create($params);
        } catch (\Throwable $e) {
            Log::error('Stripe checkout error: '.$e->getMessage());

            return back()
                ->withInput()
                ->withErrors(['stripe' => 'We could not start the payment process. Please try again in a moment.']);
        }

        $donation->update(['stripe_session_id' => $session->id]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        $donation = null;

        if ($sessionId = $request->query('session_id')) {
            try {
                $stripe = new StripeClient(config('services.stripe.secret'));
                $session = $stripe->checkout->sessions->retrieve($sessionId);

                $donation = Donation::where('stripe_session_id', $session->id)->first();

                if ($donation && $session->payment_status === 'paid' && $donation->status !== 'paid') {
                    $donation->update([
                        'status' => 'paid',
                        'stripe_payment_intent' => $session->payment_intent,
                        'stripe_subscription_id' => $session->subscription,
                    ]);
                }
            } catch (\Throwable $e) {
                Log::warning('Could not verify checkout session: '.$e->getMessage());
            }
        }

        return view('pages.donate-success', ['donation' => $donation]);
    }

    public function cancel()
    {
        return view('pages.donate-cancel');
    }

    /**
     * Stripe webhook: authoritative confirmation of payments.
     * Configure the endpoint in the Stripe Dashboard: POST https://your-domain/stripe/webhook
     */
    public function webhook(Request $request)
    {
        $secret = config('services.stripe.webhook_secret');
        $payload = $request->getContent();

        try {
            if ($secret) {
                $event = Webhook::constructEvent(
                    $payload,
                    $request->header('Stripe-Signature', ''),
                    $secret
                );
            } else {
                $event = \Stripe\Event::constructFrom(json_decode($payload, true) ?: []);
            }
        } catch (\Throwable $e) {
            Log::warning('Stripe webhook rejected: '.$e->getMessage());

            return response('Invalid payload', 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $uuid = $session->metadata->donation_id ?? null;

            $donation = $uuid
                ? Donation::where('uuid', $uuid)->first()
                : Donation::where('stripe_session_id', $session->id)->first();

            if ($donation) {
                $donation->update([
                    'status' => 'paid',
                    'email' => $donation->email ?: ($session->customer_details->email ?? null),
                    'stripe_payment_intent' => $session->payment_intent ?? null,
                    'stripe_subscription_id' => $session->subscription ?? null,
                ]);
            }
        }

        return response('ok', 200);
    }
}
