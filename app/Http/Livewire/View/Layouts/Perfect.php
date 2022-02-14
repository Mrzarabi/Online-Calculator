<?php

namespace App\Http\Livewire\View\Layouts;

use App\Models\Calculator;
use App\Models\Element;
use App\Models\Inventory;
use Livewire\Component;

class Perfect extends Component
{
     // This is all input and output properties which I'm using in template
     public $input_currency_type;
     public $input_number;
     public $input_currency_unit;
     public $output_number;
     public $output_currency_unit;
     public $image = false;
     public $inventory;
     public $cost;
     public $input;
     public $outputs;
     public $isDisabled = true;
     public $output_currency_type;
     public $min;
     public $max;
 
     // This is all rules for input properties
     protected $rules = [
         'input_currency_type' => 'string|required',
         'input_number' => 'numeric|required',
         'input_currency_unit' => 'string|required',
         'output_currency_unit' => 'string|required'
     ];
 
     public function mount()
     {
         $this->inventory = Inventory::latest()->first();
         $this->input = Calculator::where('name', 'Perfect Money')->first();
         $this->outputs = Element::where('calculator_id', $this->input->id)->get();
           $this->min = $this->input->min;
           $this->max = $this->input->max;
     }
     
     // I'm checking all changes from template with this function
     public function updated($name)
     {
         $this->validateOnly($name);
         $this->calculate($this->output_currency_type);
         $this->money_type( $this->input_currency_unit );
         if(! empty($this->input_number)  && ! empty($this->input_currency_unit) && ! empty($this->output_currency_type) ) {
               
            $this->isDisabled = false;
        }
     }
 
     // With this function I'm trading all currencies to Paypal
     public function calculate($output_currency_type) 
     {
        if($output_currency_type != null) {

            $element = Element::where('calculator_id', $this->input->id)->firstOrFail();
            $this->cost = $element->price;
    
            $this->output_number = ($this->input_number * $element->price) / 100;
            $this->output_number = $this->input_number - $this->output_number;
            $this->image = true;
        }
     }
 
     // With this function I'm checking the input currency unit form the template
    public function money_type($input_currency_unit)
    {
        if( $input_currency_unit == 'USD') {

            $this->output_currency_unit = 'USD';
        } elseif($input_currency_unit == 'EUR') {

            $this->output_currency_unit = 'EUR';
        }
    }

    public function render()
    {
        if(empty($this->output_currency_type) 
                && empty($this->input_number)  
                && empty($this->input_currency_unit) 
                && empty($this->output_currency_type)  ) {
            
            $this->isDisabled = true;
        }

        return view('livewire.view.layouts.perfect');
    }
}
