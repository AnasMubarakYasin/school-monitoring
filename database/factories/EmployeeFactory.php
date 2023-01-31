<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = fake()->randomElement(['male', 'female']);
        $state = fake()->randomElement(['honor', 'pns']);
        return [
            'photo' => fake()->imageUrl(),
            'name' => fake()->unique()->userName(),
            'telp' => fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->email(),
            'password' => '1234',

            'nip' => fake()->unique()->regexify('[0-9]{12}'),
            'fullname' => fake()->name($gender),
            'gender' => $gender,
            'state' => $state,
            'task' => fake()->jobTitle(),
        ];
    }
}
