<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('make_up_artists', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name')->nullable();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->enum('status', ['accepted', 'pending', 'rejected'])->default('pending');
            $table->string('link_map')->nullable(); // Link ke lokasi di Google Maps
            $table->string('category')->nullable(); // Kategori make up artist
            $table->text('description')->nullable(); // Deskripsi singkat tentang make up artist
            $table->text('file_certificate')->nullable(); // Path ke file sertifikat
            $table->text('profile_photo')->nullable(); // Path ke foto profil
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('make_up_artists');
    }
};
