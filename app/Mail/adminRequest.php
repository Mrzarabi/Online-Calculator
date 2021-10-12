<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class adminRequest extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $order;
    public $input;
    public $output;
    public $form;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $order, $input, $output, $form)
    {
        $this->user = $user;
        $this->order = $order;
        $this->input = $input;
        $this->output = $output;
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('You Have New Request')
                    ->view('mail.adminRequest')
                    ->with([
                        'user' =>  $this->user,
                        'order' => $this->order,  
                        'input' => $this->input,
                        'output' => $this->output,
                        'form' => $this->form
                    ]);
    }
}
