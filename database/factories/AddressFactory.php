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
            'kecamatan' => $this->faker->randomElement([
                'Air Hangat',
                'Air Hangat Timur',
                'Batang Asam',
                'Betara',
                'Danau Kerinci',
                'Danau Sipin',
                'Depati Tujuh',
                'Geragai',
                'Hamparan Rawang',
                'Jaluko',
                'Jelutung',
                'Kota Baru',
                'Kota Sarolangun',
                'Koto Baru',
                'Kumpeh',
                'Limbur Lubuk Mengkuang',
                'Limun',
                'Mandiangin',
                'Mendahara',
                'Merlung',
                'Mersam',
                'Mestong',
                'Muaro Bulian',
                'Muaro Sabak Timur',
                'Muaro Sebo',
                'Muaro Siau',
                'Muaro Tembesi',
                'Nipah Panjang',
                'Pauh',
                'Pelawan',
                'Pelepat',
                'Pelepat Ilir',
                'Pemenang',
                'Pemayung',
                'Pesisir Bukit',
                'Pengabuan',
                'Rantau Rasau',
                'Renah Mendaluh',
                'Renah Pembarap',
                'Sekernan',
                'Siulak',
                'Sungai Gelam',
                'Sungai Manau',
                'Sungai Penuh',
                'Sumay',
                'Tabir Barat',
                'Tanah Kampung',
                'Tanah Sepenggal Lintas',
                'Telanaipura',
                'Tebo Ilir',
                'Tebo Tengah',
                'Tebo Ulu',
                'VII Koto',
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
