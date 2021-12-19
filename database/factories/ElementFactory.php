<?php

namespace Database\Factories;

use App\Models\Element;
use Illuminate\Database\Eloquent\Factories\Factory;

class ElementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Element::class;

    public function definition()
    {
        $output = array(
            'Perfect Money',
            'Tehter'
        );

        return [
            'name' => array_rand($output),
            'price' => $this->faker->numberBetween(3, 6)
        ];
    }
}
