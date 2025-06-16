<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('packages')->insert([
            [
                'package_type' => 'Paket Dasar',
                'price' => 20000,
                'description' => 'Paket Dasar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_type' => 'Paket Medium',
                'price' => 20000,
                'description' => 'Paket Medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_type' => 'Paket High',
                'price' => 20000,
                'description' => 'Paket High',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
