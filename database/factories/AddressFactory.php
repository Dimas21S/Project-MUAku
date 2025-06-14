<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kota' => 'Jambi',
            'kelurahan' => $this->faker->randomElement([
                'Alam Barajo',
                'Danau Sipin',
                'Danau Teluk',
                'Telanaipura',
                'Jelutung',
                'Pelayangan',
                'Pasar',
                'Jambi Selatan',
                'Jambi Timur',
            ]),
            'link_map' => $this->faker->randomElement([
                'https://goo.gl/maps/qL1xBLTPPZyU2Gx77',
                'https://goo.gl/maps/Ht4EjrJwMKQ2',
                'https://www.google.com/maps/place/Alam+Barajo,+Jambi',
                'https://www.google.com/maps/place/Danau+Teluk,+Jambi',
                'https://www.google.com/maps/place/Telanaipura,+Jambi',
            ]),
        ];
    }
}
