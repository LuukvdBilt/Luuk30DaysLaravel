<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => fake()->randomElement([
                '$40,000', '$45,000', '$50,000', '$55,000', '$60,000', '$65,000', '$70,000', '$75,000', '$80,000', '$90,000', '$100,000'
            ]),
            'location' => 'Remote',
            'schedule' => 'Full Time',
            'url' => fake()->url(),
            'featured' => false
        ];
    }
}