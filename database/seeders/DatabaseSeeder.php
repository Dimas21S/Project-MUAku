<?php

namespace Database\Seeders;

use App\Models\MakeUpArtist;
use App\Models\User;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'user@example.com',
        //     'password' => bcrypt('password'),
        //     'role' => 'admin',
        // ]);

        MakeUpArtist::factory()->create([
            'name' => 'Devi',
            'email' => 'devi@gmail.com',
            'phone' => '987654321',
            'address' => 'Jalan Tuna 4',
            'city' => 'Jambi',
            'status' => 'makeup artist',
            'category' => 'Wedding',
            'file_certificate' => 'path/to/certificate.jpg',
            'profile_photo' => 'path/to/profile.jpg',
        ]);

        MakeUpArtist::factory()->create([
            'name' => 'Diana',
            'email' => 'dianak@gmail.com',
            'phone' => '0246813579',
            'address' => 'Jalan Tuna 7',
            'city' => 'Jambi',
            'status' => 'makeup artist',
            'category' => 'Wedding',
            'file_certificate' => 'path/to/certificate.jpg',
            'profile_photo' => 'path/to/profile.jpg',
        ]);

        MakeUpArtist::factory()->create([
            'name' => 'Rini',
            'email' => 'rini@gmail.com',
            'phone' => '192837465',
            'address' => 'Jalan Tuna 7',
            'city' => 'Jambi',
            'status' => 'makeup artist',
            'category' => 'Wedding',
            'file_certificate' => 'path/to/certificate.jpg',
            'profile_photo' => 'path/to/profile.jpg',
        ]);
    }
}
