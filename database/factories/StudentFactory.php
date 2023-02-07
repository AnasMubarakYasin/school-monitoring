<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = fake()->randomElement(['male', 'female']);
        return [
            'photo' => fake()->imageUrl(),
            'name' => fake()->unique()->userName(),
            'telp' => fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->email(),
            'password' => '1234',

            'nis' => fake()->unique()->regexify('[0-9]{12}'),
            'nisn' => fake()->unique()->regexify('[0-9]{12}'),
            'fullname' => fake()->name($gender),
            'gender' => $gender,
            'grade' => fake()->numberBetween(10, 12),

            'major_id' => 0,
            'classroom_id' => 0,
        ];
    }
}
