<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MakeUpArtist>
 */
class MakeUpArtistFactory extends Factory
{
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName,
            'name' => $this->faker->name,
            'password' => Hash::make('password'),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'status' => 'accepted',
            'category' => $this->faker->randomElement(['Pesta dan Acara', 'Pengantin', 'Artistik']),
            'description' => $this->faker->paragraph,
            'file_certificate' => 'uploads/' . $this->faker->randomElement([
                '1748491075_Screenshot 2025-05-08 201441.png',
                '1748491046_Screenshot 2025-05-08 201441.png'
            ]),
        ];
    }
}
