<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BotStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $status;
    public $bot;
    public $reason;
    
    /**
     * Create a new message instance.
     */
    public function __construct($status, $bot, $reason)
    {
        $this->status = $status;
        $this->bot = $bot;
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
            subject: 'Bot Status',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.bot-status',
            with: [
                'status' => $this->status,
                'bot' => $this->bot,
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
