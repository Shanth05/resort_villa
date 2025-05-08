<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResortController;
use App\Http\Controllers\VillaController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/resorts', [ResortController::class, 'index']);
Route::get('/resorts/{id}', [ResortController::class, 'show']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/villas/{resort_id}', [VillaController::class, 'getByResort']);
    Route::get('/rooms/{villa_id}', [RoomController::class, 'getByVilla']);

    Route::post('/bookings', [BookingController::class, 'store']);
    Route::get('/bookings', [BookingController::class, 'index']);
});
