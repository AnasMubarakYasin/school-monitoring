<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppNotifierUpdateClient extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $name = config('dynamic.application.name');
        $num = config('dynamic.application.version');
        return new Envelope(
            from: new Address('bladerlaiga.97@gmail.com', 'Anas Mubarak Yasin'),
            subject: "$name Update v$num",
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $name = config('dynamic.application.name');
        $num = config('dynamic.application.version');
        return new Content(
            markdown: 'emails.app.notifier-update-client',
            with: [
                'name' => $name,
                'num' => $num,
                'url' => env('APP_URL'),
                'vendor' => config('dynamic.application.vendor_name'),
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
