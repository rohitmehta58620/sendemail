<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $messageBody;

    public function __construct($email, $messageBody)
    {
        $this->email = $email;
        $this->messageBody = $messageBody;
    }

    public function build()
    {
        return $this->to($this->email)
            ->subject("New Message from EduGaon Website")
            ->view('emails.user_mail')
            ->with([
                'messageBody' => $this->messageBody,
            ]);
    }
}