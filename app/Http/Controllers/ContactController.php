<?php

namespace App\Http\Controllers;

use App\Mail\ContactSubmissionMail;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function volunteer(Request $request)
    {
        return $this->store($request, 'volunteer', 'Thank you for offering your time! We will be in touch soon.');
    }

    public function partnership(Request $request)
    {
        return $this->store($request, 'partnership', 'Thank you for your interest in partnering with us! We will be in touch soon.');
    }

    private function store(Request $request, string $type, string $successMessage)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'organization' => ['nullable', 'string', 'max:190'],
            'message' => ['required', 'string', 'max:5000'],
            // Honeypot field — real users never fill this in.
            'website' => ['nullable', 'string', 'max:0'],
        ], [
            'website.max' => 'Submission rejected.',
        ]);

        $submission = ContactSubmission::create([
            'type' => $type,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'organization' => $validated['organization'] ?? null,
            'message' => $validated['message'],
        ]);

        // Email the admin, but never lose the submission if mail fails.
        try {
            Mail::to(config('fuel4kids.email'))->send(new ContactSubmissionMail($submission));
        } catch (\Throwable $e) {
            Log::error('Contact email failed: '.$e->getMessage());
        }

        return back()->with('success', $successMessage);
    }
}
