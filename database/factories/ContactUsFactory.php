<?php

namespace Database\Factories;

use App\Models\Opinion\ContactUs\ContactUs;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = ContactUs::class;
    
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'body' => $this->faker->text()
        ];
    }
}
