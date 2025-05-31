<?php

namespace Database\Seeders;

use App\Models\MakeUpArtist;
use App\Models\User;
use App\Models\Address;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Pembuatan data user dan make up artist
        // Menggunakan factory untuk membuat data user dan make up artist
        // Menggunakan model User dan MakeUpArtist untuk membuat data
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // MakeUpArtist::factory()
        //     ->has(Address::factory()->state([
        //         'alamat' => 'Jalan Tuna 7',
        //         'city' => 'Jambi',
        //     ]))
        //     ->create([
        //         'username' => 'riri123',
        //         'name' => 'Rini',
        //         'password' => bcrypt('rini123'),
        //         'email' => 'rini@gmail.com',
        //         'phone' => '192837465',
        //         'status' => 'accepted',
        //         'category' => 'Editorial',
        //         'file_certificate' => 'path/to/certificate.jpg',
        //         'profile_photo' => 'path/to/profile.jpg',
        //     ]);
    }
}
