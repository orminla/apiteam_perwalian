<?php

use App\Http\Controllers\Api\RekomendasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('rekomendasi', [RekomendasiController::class, 'rekomendasi']);
// Route::post('rekomendasi', [RekomendasiController::class, 'rekomendasi_create']);