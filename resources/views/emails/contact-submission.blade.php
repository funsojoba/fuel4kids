<!DOCTYPE html>
<html>
<body style="font-family: Arial, Helvetica, sans-serif; color:#1f2937; line-height:1.6; max-width:560px; margin:0 auto; padding:24px;">
    <div style="background:#166534; color:#ffffff; padding:16px 24px; border-radius:12px 12px 0 0;">
        <h2 style="margin:0; font-size:18px;">New {{ ucfirst($submission->type) }} Inquiry</h2>
    </div>
    <div style="border:1px solid #e5e7eb; border-top:0; padding:24px; border-radius:0 0 12px 12px;">
        <p style="margin:0 0 6px;"><strong>Name:</strong> {{ $submission->name }}</p>
        <p style="margin:0 0 6px;"><strong>Email:</strong> {{ $submission->email }}</p>
        @if ($submission->phone)
            <p style="margin:0 0 6px;"><strong>Phone:</strong> {{ $submission->phone }}</p>
        @endif
        @if ($submission->organization)
            <p style="margin:0 0 6px;"><strong>Organization:</strong> {{ $submission->organization }}</p>
        @endif
        <p style="margin:16px 0 6px;"><strong>Message:</strong></p>
        <p style="margin:0; background:#f9fafb; border-radius:8px; padding:14px; white-space:pre-line;">{{ $submission->message }}</p>
        <p style="margin:20px 0 0; font-size:12px; color:#6b7280;">Received {{ $submission->created_at->format('M j, Y g:i A') }} · Fuel4Kids website</p>
    </div>
</body>
</html>
