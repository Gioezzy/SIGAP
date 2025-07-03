<?php

use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\users\AspirasiController;
use App\Http\Controllers\users\BeritaController;
use App\Http\Controllers\users\KehilanganController;
use App\Http\Controllers\users\KeramaianController;
use App\Http\Controllers\users\KritikSaranController;
use App\Http\Controllers\users\PengaduanController;
use App\Http\Controllers\users\ProfilesController;
use App\Http\Controllers\users\TanggapanAspirasiController;
use App\Http\Controllers\users\TanggapanKehilanganController;
use App\Http\Controllers\users\TanggapanKeramaianController;
use App\Http\Controllers\users\TanggapanKritikSaranController;
use App\Http\Controllers\users\TanggapanPengaduanController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/redirect', [SocialController::class, 'googleRedirect'])->name('google.redirect');
Route::get('/auth/callback', [SocialController::class, 'loginWithGoogle'])->name('google.callback');

Route::get('/', [BeritaController::class, 'home'])->name('home');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/profil', [ProfilesController::class, 'index'])->name('profiles.index');
Route::get('/profil/{slug}', [ProfilesController::class, 'show'])->name('profiles.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/pengaduan', PengaduanController::class);
    Route::resource('/kritiksaran', KritikSaranController::class);
    Route::resource('/aspirasi', AspirasiController::class);
    Route::resource('/kehilangan', KehilanganController::class);
    Route::resource('/keramaian', KeramaianController::class);
    Route::get('/tanggapanpengaduan', [TanggapanPengaduanController::class, 'index'])->name('tanggapan.pengaduan.index');
    Route::get('/tanggapankritiksaran', [TanggapanKritikSaranController::class, 'index'])->name('tanggapan.kritiksaran.index');
    Route::get('/tanggapanaspirasi', [TanggapanAspirasiController::class, 'index'])->name('tanggapan.aspirasi.index');
    Route::get('/tanggapankehilangan', [TanggapanKehilanganController::class, 'index'])->name('tanggapan.kehilangan.index');
    Route::get('/tanggapankeramaian', [TanggapanKeramaianController::class, 'index'])->name('tanggapan.keramaian.index');
});

require __DIR__.'/auth.php';
