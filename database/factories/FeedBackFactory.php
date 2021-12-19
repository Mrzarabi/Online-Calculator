<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedBackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Feedback::class;
    public function definition()
    {
        return [
            'body' => $this->faker->text,
            'show' => $this->faker->boolean()
        ];
    }
}
