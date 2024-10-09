<?php

use App\Http\Controllers\Api\IntegrationController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MahasiswaController;

// Route::middleware(['auth:sanctum'])->group( function () {
    Route::GET('/mahasiswa', [IntegrationController::class , 'mahasiswa']);
    Route::POST('/mahasiswa', [IntegrationController::class, 'mahasiswa_create']);
// });

Route::prefix('sibaper')->group(function() {
    require __DIR__ .'\sibaper.php';
});
Route::prefix('sirekap')->group(function() {
    require __DIR__ .'\sirekap.php';
});
Route::prefix('perwalian')->group(function() {
    require __DIR__ .'\perwalian.php';
});
Route::prefix('rps')->group(function() {
    require __DIR__ .'\rps.php';
});
