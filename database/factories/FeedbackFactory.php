<?php

namespace Database\Factories;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    // Define the model for this factory
    protected $model = Feedback::class;

    // Define the data structure for generating fake feedback
    public function definition()
    {
        return [
            'name' => $this->faker->name, // Generate a fake name
            'phone' => $this->faker->phoneNumber, // Generate a fake phone number
            'message' => $this->faker->paragraph // Generate a fake message (paragraph)
        ];
    }
}
