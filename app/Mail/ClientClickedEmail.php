<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\Click;

class ClientClickedEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $click;
    /**
     * Create a new message instance.
     */
    public function __construct(Click $click)
    {
        $this->click =  $click;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hello'. $this->click->client->name .' You received a new click',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.new-click',
        );
    }


}
