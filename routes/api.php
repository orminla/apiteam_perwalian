<?php

use App\Http\Controllers\Api\RekomendasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route untuk mengambil semua rekomendasi
Route::get('rekomendasi', [RekomendasiController::class, 'index']);
// // Route untuk mengedit rekomendasi berdasarkan id
// Route::put('rekomendasi/{id}', [RekomendasiController::class, 'edit']);
// // Route untuk menghapus rekomendasi berdasarkan id
// Route::delete('rekomendasi/{id}', [RekomendasiController::class, 'delete']);