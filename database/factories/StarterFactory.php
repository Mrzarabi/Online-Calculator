<?php

namespace Database\Factories;

use App\Models\Starter;
use Illuminate\Database\Eloquent\Factories\Factory;

class StarterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Starter::class;
    
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'start_number' => $this->faker->numberBetween(100, 10000),
            'closed' => $this->faker->boolean(),
        ];
    }
}
