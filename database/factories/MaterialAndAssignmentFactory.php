<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MaterialAndAssignment>
 */
class MaterialAndAssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subjects_id' => 0,
            'classroom_id' => 0,
            'teacher_id' => 0,
            'type' => fake()->randomElement(['material', 'assignment']),
            'start_at' => fake()->dateTimeBetween('-3 month'),
            'end_at' => fake()->dateTimeBetween('now', '+3 month'),
            'description' => fake()->slug(),
        ];
    }
}
