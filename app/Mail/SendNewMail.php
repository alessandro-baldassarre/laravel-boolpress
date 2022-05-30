<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $senderName;
    protected $senderEmail;
    protected $senderMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($senderName, $senderEmail, $senderMessage)
    {
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
        $this->senderMessage = $senderMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->senderEmail)
        ->view('email.body',
        [
            "senderName" => $this->senderName ,
            "senderEmail" => $this->senderEmail,
            "senderMessage" => $this->senderMessage
        ]);
    }
}
