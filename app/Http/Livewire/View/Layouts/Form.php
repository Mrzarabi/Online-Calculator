<?php

namespace App\Http\Livewire\View\Layouts;

use App\Models\Calculator;
use App\Models\Element;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Form extends Component
{
    public $email;
    public $email_confirmation;
    public $contact_email;
    public $contact_email_confirmation;
    public $wallet;
    public $telegram;
    public $whatsApp;
    public $skype;
    public $extra;
    public $cheack = false;
    public $order;
    public $isDisabled = true;
    public $input;
    public $output;
    public $email_text = '';
    public $contact_email_text = '';

    protected $rules = [
        'email' => 'required|string|email|max:255|confirmed',
        'contact_email' => 'required|string|email|max:255|confirmed',
        'wallet' => 'required|string|max:255',
        'telegram' => 'nullable|string|max:255',
        'whatsApp' => 'nullable|string|max:255',
        'skype' => 'nullable|string|max:255',
        'extra' => 'nullable|string|max:255',
        'cheack' => 'boolean',
    ];

    public function mount()
    {
        $order = auth()->user()->orders()->latest()->first();
        $this->input = Calculator::where('id', $order->input_currency_type)->first();
        $this->output = Element::where('id', $order->output_currency_type)->first();
        $this->order = $order;
    }

    public function updated($name)
    {
        $this->validateOnly($name);

        if( $this->email !== $this->email_confirmation ) {
            
            $this->email_text = 'Your email does not match yet';
        } else { 

            $this->email_text = '' ;
        }

        if( $this->contact_email !== $this->contact_email_confirmation ) {
            
            $this->contact_email_text = 'Your contact email does not match yet';
        } else { 

            $this->contact_email_text = '' ;
        }

        if( ! empty($this->email) && ! empty($this->contact_email) ) {

            if( $this->cheack == true && $this->email === $this->email_confirmation &&  $this->contact_email === $this->contact_email_confirmation ) {
                
                $this->isDisabled = false;
            }
        }
    }

    public function render()
    {
        if(empty($this->email)) {

            $this->isDisabled = true;
        }
        return view('livewire.view.layouts.form');
    }
}
