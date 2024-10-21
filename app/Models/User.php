<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // Menggunakan trait HasFactory dan Notifiable untuk mendukung fitur-fitur bawaan Laravel
    use HasFactory, Notifiable;

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     * Ini menentukan kolom mana yang dapat diisi menggunakan metode create atau update.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',        // Nama pengguna
        'email',       // Email pengguna
        'password',    // Kata sandi pengguna
    ];

    /**
     * Atribut yang akan disembunyikan saat model diserialisasi.
     * Biasanya digunakan untuk menyembunyikan informasi sensitif, seperti kata sandi.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',         // Kata sandi
        'remember_token',   // Token untuk fungsi "remember me" saat login
    ];

    /**
     * Atribut yang perlu dikonversi ke tipe data yang sesuai.
     * Misalnya, kolom datetime atau pengolahan hash pada kata sandi.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',  // Konversi kolom email_verified_at menjadi tipe datetime
        'password' => 'hashed',             // Secara otomatis meng-hash kata sandi saat disimpan
    ];
}
