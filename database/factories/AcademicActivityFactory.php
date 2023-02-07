<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcademicActivity>
 */
class AcademicActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->jobTitle(),
            'duration' => fake()->numberBetween(1, 7),
            'executive' => fake()->name(),
            'type' => fake()->jobTitle(),
            'start_at' => fake()->dateTimeBetween('-3 month'),
            'end_at' => fake()->dateTimeBetween('now', '+3 month'),
            'description' => fake()->slug(),
        ];
    }
}
