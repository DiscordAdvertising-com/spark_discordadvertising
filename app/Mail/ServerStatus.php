<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ServerStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $status;
    public $server;
    public $reason;
    
    /**
     * Create a new message instance.
     */
    public function __construct($status, $server, $reason)
    {
        $this->status = $status;
        $this->server = $server;
        if($status == 'Rejected') {
            $this->reason = "Reason: ".$reason;
        } else {
            $this->reason = "Congratulations!";
        }
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Server Status',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.server-status',
            with: [
                'status' => $this->status,
                'server' => $this->server,
                'reason' => $this->reason,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
