<?php

namespace Database\Seeders;

use App\Models\MakeUpArtist;
use App\Models\User;
use App\Models\Address;
use App\Models\Photo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat user admin dengan email berbeda
        $users = [
            ['name' => 'frizka', 'email' => 'frizka@example.com', 'password' => bcrypt('frizka12345'), 'role' => 'admin'],
            ['name' => 'ica', 'email' => 'ica@example.com', 'password' => bcrypt('ica12345'), 'role' => 'customer'],
            ['name' => 'salsa', 'email' => 'salsa@example.com', 'password' => bcrypt('salsa1234'), 'role' => 'admin'],
            ['name' => 'caca', 'email' => 'caca@example.com', 'password' => bcrypt('caca1234'), 'role' => 'customer'],
            ['name' => 'jaswita', 'email' => 'jaswita@example.com', 'password' => bcrypt('jaswita1234'), 'role' => 'admin'],
            ['name' => 'manda', 'email' => 'manda@example.com', 'password' => bcrypt('manda1234'), 'role' => 'customer'],
            ['name' => 'anisa', 'email' => 'anisa@example.com', 'password' => bcrypt('anisa1234'), 'role' => 'admin'],
            ['name' => 'cica', 'email' => 'cica@example.com', 'password' => bcrypt('cica1234'), 'role' => 'customer'],
        ];

        foreach ($users as $user) {
            User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'role' => $user['role'],
            ]);
        }

        // Membuat 50 MakeUpArtist lengkap dengan address, photos, dan social media links
        // MakeUpArtist::factory(10)->create()->each(function ($artist) {
        //     // Tambah alamat
        //     $artist->address()->save(Address::factory()->make());
        // });
    }
}
