<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presence>
 */
class PresenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->name,
            
            'school_year_id' => 0,
            'semester_id' => 0,
            'teacher_id' => 0,
            'subjects_id' => 0,
            'classroom_id' => 0,
        ];
    }
}
