<?php

namespace App\Http\Livewire\View\Layouts;

use App\Models\Calculator;
use App\Models\Element;
use App\Models\Inventory;
use Livewire\Component;

class Index extends Component
{
    // This is all input and output properties which I'm using in template
    public $input_currency_type;
    public $input_number;
    public $input_currency_unit;
    public $output_currency_type;
    public $output_number;
    public $output_currency_unit;
    public $image = false;
    public $inventory;
    public $cost;
    public $outputs; 
    public $inputs; 
    public $element;
    public $isDisabled = true;
    public $min;
    public $max;

    // This is all rules for input properties
    protected $rules = [
        'input_currency_type' => 'string|required',
        'input_number' => 'numeric|required',
        'input_currency_unit' => 'string|required',
        'output_currency_type' => 'string|required',

    ];

    public function mount()
    {
        $this->inventory = Inventory::latest()->first();
        $this->inputs = Calculator::all();
    }
    
    // I'm checking all changes from template with this function
    public function updated($name)
    {
        $this->validateOnly($name);
        $this->show_min_max($this->input_currency_type);
        $this->find_output_currncy_type($this->input_currency_type);
        $this->calculate($this->output_currency_type); 
        $this->money_type( $this->input_currency_unit );
        $this->cheack($this->input_currency_type, $this->input_number, $this->input_currency_unit, $this->output_currency_type);
        if(! empty($this->input_currency_type) && ! empty($this->input_number)  && ! empty($this->input_currency_unit) && ! empty($this->output_currency_type) ) {
            
            $this->isDisabled = false;
        }
    }

    // this function show min and max value of each input currency where selected
    public function show_min_max($input_currency_type)
    {
        $input = Calculator::findOrFail($input_currency_type);
        $this->min = $input->min;
        $this->max = $input->max;
    }

    // this function for finding output currency name and currency price
    public function find_output_currncy_type($input_currency_type)
    {
        $this->outputs = Element::where('calculator_id', $input_currency_type)->get();
    }

    // With this function I'm trading all currencies to Paypal
    public function calculate($output_currency_type) 
    {
        if($output_currency_type != null) {

            $element = Element::where('id', $output_currency_type)->firstOrFail();
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

    // this function is cheack all inputs and select must have value and if they haven't the confirm buttom is disabled 
    public function cheack($input_currency_type, $input_number, $input_currency_unit, $output_currency_type)
    {
        if(! empty($input_currency_type) 
                && ! empty($input_number)  
                && ! empty($input_currency_unit) 
                && ! empty($output_currency_type)  ) {
            
            $this->isDisabled = false;
        }
    }

    // Return Template
    public function render()
    {
        if(empty($this->output_currency_type) 
                && ! empty($this->input_number)  
                && ! empty($this->input_currency_unit) 
                && ! empty($this->output_currency_type)  ) {
            
            $this->isDisabled = true;
        }

        return view('livewire.view.layouts.index');
    }
}
