<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaController;

Route::middleware('auth:sanctum')->group( function () {
    Route::prefix('api')->group(function() {
        // Mahasiswa
        Route::prefix('/mahasiswa')->group(function() {
            Route::get('/', function() {
                return redirect()->route('api-data-mahasiswa');
            });
            Route::get('/data', [MahasiswaController::class , 'index'])->name('api-data-mahasiswa');
            Route::get('/edit/{nim}', [MahasiswaController::class , 'edit'])->name('api-edit-mahasiswa');
        });

        Route::prefix('sibaper')->group(function() {
            Route::get('/', function () {
                echo 'Hai';
            });
        });
        Route::prefix('sirekap')->group(function() {
            Route::get('/', function () {
                echo 'Hai';
            });
        });
        Route::prefix('perwalian')->group(function() {
            Route::get('/', function () {
                echo 'Hai';
            });
        });
        Route::prefix('rps')->group(function() {
            Route::get('/', function () {
                echo 'Hai';
            });
        });
    });
});
