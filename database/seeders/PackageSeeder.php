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
                'package_type' => 'Basic',
                'price' => 50000,
                'description' => 'Paket Basic untuk akses fitur dasar Make Up Artist.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_type' => 'Medium',
                'price' => 100000,
                'description' => 'Paket Premium dengan akses lebih banyak MUA dan fitur tambahan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_type' => 'High',
                'price' => 150000,
                'description' => 'Paket VIP dengan akses eksklusif ke MUA terbaik dan chat prioritas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
