<?php

namespace App\Mail;

use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class RegistrationSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The registration instance.
     *
     * @var \App\Models\Registration
     */
    public $registration;
    public $pdf;
    public $fileFields;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Registration  $registration
     * @param  mixed  $pdf
     * @param  array  $fileFields
     * @return void
     */
    public function __construct(Registration $registration, $pdf, $fileFields)
    {
        $this->registration = $registration;
        $this->pdf = $pdf;
        $this->fileFields = $fileFields;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Smartify Tech Services Registration',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.registration_success',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        // Attach the generated PDF of registration data
        $attachments[] = Attachment::fromData(fn () => $this->pdf->output(), 'registration_details.pdf')
            ->withMime('application/pdf');

        // Attach the files uploaded by the user
        foreach ($this->fileFields as $field) {
            if ($this->registration->{$field}) {
                $attachments[] = Attachment::fromPath(storage_path('app/public/' . $this->registration->{$field}));
            }
        }

        return $attachments;
    }
}
