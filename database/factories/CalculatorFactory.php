<?php

namespace Database\Factories;

use App\Models\Calculator;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalculatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Calculator::class;

    public function definition()
    {
        $input = array(
            'Cach',
            'Tether', 
            'Paypal'
        );
        return [
            'name' => $input[array_rand($input)],
        ];
    }
}
