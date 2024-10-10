<?php

use App\Http\Controllers\Api\RekomendasiController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     echo "TEST";
// });

// Route untuk mengambil data rekomendasi
Route::get('rekomendasi', [RekomendasiController::class, 'rekomendasi']);
Route::post('rekomendasi', [RekomendasiController::class, 'rekomendasi_create']);