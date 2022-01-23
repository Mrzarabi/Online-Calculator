<?php

namespace App\Jobs;

use App\Mail\adminRequest;
use App\Mail\perfect;
use App\Mail\tether;
use App\Models\Calculator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessForm implements ShouldQueue
{
    protected $order;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tether = Calculator::where('name', 'Tether (TRC 20)')->first();
        $perfect = Calculator::where('name', 'Perfect Money')->first();

        if(isset($tether) && $this->order->calculator_id == $tether->id) {
                
            Mail::to($this->order->form->contact_email)->send( new tether($this->order->user ,$this->order));
        }
        if(isset($perfect) && $this->order->calculator_id == $perfect->id) {
            
            Mail::to($this->order->form->contact_email)->send( new perfect($this->order->user ,$this->order));
        } 

        Mail::to('samxpay@gamil.com')->send( new adminRequest($this->order) );

    }

    public function failed()
    {
        dd('you have error');
        Mail::to('samxpay@gamil.com')->send( new adminRequest($this->order, $this->order->calculator->name, $this->order->element->name, $this->form) );
    }
}
