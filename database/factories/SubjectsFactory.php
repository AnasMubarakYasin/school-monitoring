<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subjects>
 */
class SubjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake()->unique()->regexify('[0-9]{6}'),
            'name' => fake()->randomElement(['kimia', 'biology', 'ipa', 'ips']),
            'grade' => fake()->numberBetween(10, 12),
            'description' => fake()->slug(),

            'major_id' => 0,
            'teacher_id' => 0,
        ];
    }
}
