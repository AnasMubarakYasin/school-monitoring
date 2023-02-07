<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'state' => fake()->randomElement(['present', 'unpresent']),
            'description' => fake()->slug(),
            
            'presence_id' => 0,
            'student_id' => 0,
        ];
    }
}
