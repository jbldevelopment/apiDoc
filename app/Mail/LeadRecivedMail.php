<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LeadRecivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead_details;
    public function __construct($lead_details)
    {
        $this->lead_details = $lead_details;
    }


    public function envelope()
    {
        return new Envelope(
            subject: 'Lead Recived Mail',
        );
    }


    public function content()
    {
        return new Content(
            view: 'frontend.emails.leadrecived',
        );
    }


    public function attachments()
    {
        return [];
    }

    public function build()
    {
        return $this->from(config('mail.from.address'))
            ->subject('Lead Details')
            ->view('frontend.emails.leadrecived')
            ->with(['lead_details' => $this->lead_details]);
    }
}
