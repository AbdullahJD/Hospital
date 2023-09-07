<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $appointment;

    public function __construct($name,$appointment)
    {
        $this->name=$name;
        $this->appointment=$appointment;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'تأكيد موعد',
        );
    }

    public function content(): Content
    {
        return new Content(markdown: 'emails.appointments');
    }
    public function attachments(): array
    {
        return [];
    }
}
