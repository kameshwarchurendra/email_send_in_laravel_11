<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomMail extends Mailable{
//====================Start===========================//
    use Queueable, SerializesModels;
    
    public $messageContent;
    public $subjectLine;
    /**
     * Create a new message instance.
     */
    public function __construct($messageContent,$subjectLine){

        $this->messageContent = $messageContent;
        $this->subjectLine = $subjectLine;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Custom Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content{
        return new Content(
            view: 'emails.custom',
        );
    }

    public function build(){
        return $this->subject($this->subjectLine)
                    ->view('emails.custom')
                    ->with([
                        'messageContent' => $this->messageContent,
                    ]);
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
//====================End===========================//

}
