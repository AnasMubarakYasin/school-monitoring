<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Major>
 */
class MajorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $expertise = fake()->randomElement(['kimia', 'biology']);
        return [
            'name' => fake()->name(),
            'expertise' => $expertise,
            'general_competence' => fake()->slug(),
            'special_competence' => fake()->slug(),
        ];
    }
}