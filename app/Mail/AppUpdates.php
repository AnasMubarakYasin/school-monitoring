<?php

namespace App\Mail;

use App\Dynamic\Updates;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppUpdates extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public string $stakeholder, public Updates $updates)
    {
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('bladerlaiga.97@gmail.com', 'Anas Mubarak Yasin'),
            subject: "$this->updates->name New Updates v$this->updates->version",
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.app.updates',
            with: [
                'name' => $this->updates->name,
                'version' => $this->updates->version,
                'last_version' => $this->updates->last_version,
                'changes' => $this->updates->changes,
                'link' => $this->updates->link,
                'vendor' => $this->updates->vendor,
                'stakeholder' => $this->stakeholder,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
