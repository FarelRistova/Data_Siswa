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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); // Batas maksimal 100 karakter
            $table->string('email', 150)->unique(); // Email harus unik
            $table->timestamp('email_verified_at')->nullable(); // Kolom untuk verifikasi email
            $table->string('password', 255); // Password disimpan dalam bentuk hash (panjang karakter hash biasanya 60-255)
            $table->rememberToken(); // Token untuk "remember me" fitur
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
