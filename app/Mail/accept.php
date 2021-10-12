<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class accept extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $input;
    public $output;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $input, $output)
    {
        $this->order = $order;
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('We Accepted Your Request In SAMXPAY')
                    ->view('mail.accept')
                    ->with([
                        'order' => $this->order,
                        'input' => $this->input,
                        'output' => $this->output,
                    ]);

                    
    }
}
