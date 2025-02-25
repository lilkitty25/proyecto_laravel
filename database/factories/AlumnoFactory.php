<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre" => $this->faker->name(),
            "dni" => $this->faker->unique()->randomNumber(9),
            "email" => $this->faker->unique()->safeEmail(),
            "password" => bcrypt('password')
            //
        ];
    }
}
