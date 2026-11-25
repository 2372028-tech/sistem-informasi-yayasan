<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/superadmin/dashboard', fn () => 'Halaman Dashboard Super Admin')->name('superadmin.dashboard');
});

Route::middleware(['auth', 'role:ketua_yayasan'])->group(function () {
    Route::get('/ketua/dashboard', fn () => 'Halaman Executive Dashboard Ketua Yayasan')->name('ketua.dashboard');
});

Route::middleware(['auth', 'role:admin_rumah'])->group(function () {
    Route::get('/rumah/dashboard', fn () => 'Halaman Dashboard Admin Rumah')->name('rumah.dashboard');
});

Route::middleware(['auth', 'role:admin_keuangan'])->group(function () {
    Route::get('/keuangan/dashboard', fn () => 'Halaman Dashboard Admin keuangan')->name('keuangan.dashboard');
});

Route::middleware(['auth', 'role:admin_humas'])->group(function () {
    Route::get('/humas/dashboard', fn () => 'Halaman Dashboard Admin Humas')->name('humas.dashboard');
});

Route::middleware(['auth', 'role:donatur'])->group(function () {
    Route::get('/donatur/dashboard', fn () => 'Halaman Dashboard Donatur')->name('donatur.dashboard');
});

require __DIR__.'/auth.php';
