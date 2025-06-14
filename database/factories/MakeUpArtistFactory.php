<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MakeUpArtist>
 */
class MakeUpArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->userName,
            'name' => $this->faker->name,
            'password' => bcrypt('password'), // atau Hash::make()
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'status' => 'accepted',
            'category' => $this->faker->randomElement(['Pesta dan Acara', 'Pengantin', 'Artistik']),
            'description' => $this->faker->paragraph,
            'file_certificate' => 'storage/uploads/' . $this->faker->randomElement([
                '1748491075_Screenshot 2025-05-08 201441.png',
                '1748491046_Screenshot 2025-05-08 201441.png'
            ]),
            'profile_photo' => 'profiles/sample.jpg',
        ];
    }
}
