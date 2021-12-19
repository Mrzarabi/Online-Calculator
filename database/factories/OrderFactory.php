<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{

    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $input = array(
            'Cach',
            'Tether', 
            'Paypal'
        );

        $type = array(
            'dollar',
            'euro'
        );

        $output = array(
            'Perfect Money',
            'Tehter'
        );

        return [
            'input_currency_type' => array_rand($input),
            'input_number' => $this->faker->numberBetween(1000, 10000),
            'input_currency_unit' => array_rand($type),
            'output_currency_type' => array_rand($output),
            'output_number' => $this->faker->numberBetween(1000, 10000),
            'output_currency_unit' => array_rand($type),
            'order_no' => $this->faker->numberBetween(100, 10000),
            'accept' => $this->faker->boolean(),
        ];
    }
}
