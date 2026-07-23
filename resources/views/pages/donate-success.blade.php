@extends('layouts.app')

@section('title', 'Thank You — Fuel4Kids')

@section('content')
    <section class="max-w-2xl mx-auto px-4 py-24 text-center">
        <div class="reveal is-visible">
            <div class="w-24 h-24 mx-auto bg-brand-50 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-brand-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h1 class="font-display text-4xl font-bold text-brand-800 mt-8">Thank you for your generosity!</h1>
            @if ($donation && $donation->status === 'paid')
                <p class="mt-5 text-lg text-ink/75">
                    Your {{ $donation->frequency === 'monthly' ? 'monthly gift' : 'donation' }} of
                    <span class="font-extrabold text-brand-700">{{ $donation->amountFormatted() }}</span>
                    {{ $donation->frequency === 'monthly' ? 'per month ' : '' }}was received successfully.
                </p>
            @else
                <p class="mt-5 text-lg text-ink/75">Your donation is being processed. A receipt will be emailed to you by Stripe.</p>
            @endif
            <p class="mt-4 text-lg text-ink/75 leading-relaxed">
                Because of you, more children will feel seen, supported, and full of potential. Nourish the child. Strengthen the village.
            </p>
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="{{ route('home') }}" class="bg-brand-700 hover:bg-brand-800 text-white font-extrabold px-8 py-3.5 rounded-full transition">Back to Home</a>
                <a href="{{ route('our-work') }}" class="border-2 border-brand-200 hover:border-brand-400 text-brand-700 font-extrabold px-8 py-3.5 rounded-full transition">See the impact</a>
            </div>
        </div>
    </section>
@endsection
