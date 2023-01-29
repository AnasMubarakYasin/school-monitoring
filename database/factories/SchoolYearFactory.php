<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolYear>
 */
class SchoolYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start_at = fake()->dateTimeInInterval('-6 month', '+1 year');
        $end_at = fake()->dateTimeInInterval('+6 month', '-1 year');
        return [
            'name' => $start_at->format('YYYY') . "/" . $end_at->format('YYYY'),
            'start_at' => $start_at,
            'end_at' => $end_at,
        ];
    }
}
