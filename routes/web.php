<?php
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rute untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Rute untuk registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rute untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute yang membutuhkan pengguna untuk login
Route::middleware(['auth'])->group(function () {
    // Rute untuk menampilkan siswa
    Route::get('/siswa/tampil', [SiswaController::class, 'tampil'])->name('siswa.tampil');

    // Rute untuk menambah siswa
    Route::get('/siswa/tambah', [SiswaController::class, 'tambah'])->name('siswa.tambah');

    // Rute untuk menyimpan data siswa
    Route::post('/siswa/submit', [SiswaController::class, 'submit'])->name('siswa.submit');

    // Rute untuk mengedit siswa
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');

    // Rute untuk menghapus siswa
    Route::delete('/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');

    // Rute untuk manajemen pengguna
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    // Rute untuk logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});