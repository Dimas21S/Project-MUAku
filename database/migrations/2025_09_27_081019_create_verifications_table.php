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
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('make_up_artist_id')->constrained()->onDelete('cascade');
            $table->string('username');
            $table->string('name')->nullable();
            $table->string('password');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->enum('status', ['accepted', 'pending', 'rejected'])->default('pending');
            $table->text('description')->nullable();
            $table->string('category')->nullable(); // Kategori make up artist
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
        Schema::dropIfExists('verifications');
    }
};
