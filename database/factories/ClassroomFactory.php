<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
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
            'name' => fake()->unique()->name(),
            'total_student' => fake()->randomNumber(2),
            'description' => fake()->slug(),

            'major_id' => 0,
            'homeroom_id' => 0,
        ];
    }
}
