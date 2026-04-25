<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

final class LandingRequestReceivedMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(
        public string $name,
        public string $phone,
        public string $question,
        public ?string $ipAddress,
        public ?string $city,
        public ?string $userAgent,
        public Carbon $sentAt,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Новая заявка с формы обратной связи',
            tags: ['landing-request'],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.landing.request-received',
            text: 'emails.landing.request-received-text',
        );
    }
}
