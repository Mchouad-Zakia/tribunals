<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\utilisateurs>
 */
class UtilisateursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $password = '123456789';
        return [
            'email'=>fake()->unique()->safeEmail(),
            'password' => Hash::make($password),
            'created_at' => now(),
        'updated_at' => now(),

        ];
    }
}
