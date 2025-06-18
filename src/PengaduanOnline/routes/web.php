<?php

use App\Http\Controllers\users\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\users\BeritaController;
use App\Http\Controllers\users\TanggapanPengaduanController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BeritaController::class, 'home'])->name('home');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/pengaduan', PengaduanController::class);
    Route::get('/tanggapan', [TanggapanPengaduanController::class, 'index'])->name('tanggapan.index');
});

require __DIR__.'/auth.php';    
