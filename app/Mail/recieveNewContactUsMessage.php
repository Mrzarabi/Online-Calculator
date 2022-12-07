<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class recieveNewContactUsMessage extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $name, $email, $body )
    {
        $this->name = $name;
        $this->email = $email;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('You Have New Message From Contact Us Page')
                    ->view('mail.reciveNewContactUsMessage')
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'body' => $this->body,
                    ]);
    }
}
