<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PengaduanApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Login (Public)
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // CRUD Pengaduan
    Route::apiResource('/pengaduan', PengaduanApiController::class);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
