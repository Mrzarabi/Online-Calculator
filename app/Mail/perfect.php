<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class perfect extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.perfect')
                    ->subject("Dear {$this->user->name} , This E-Mail is from SamxPay.com")
                    ->with([
                    'order' => $this->order
                ]);
    }
}
