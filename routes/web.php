<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Informasi\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::GET('/', function() {
    return redirect()->route('admin-dashboard-index');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function() {
        Route::GET('/', function () {
            return view('admin.dashboard.index');
        })->name('admin-dashboard-index');
        Route::GET('/data-mahasiswa', [MahasiswaController::class, 'index'])->name('data-mahasiswa');
        Route::GET('/tambah-data-mahasiswa', [MahasiswaController::class, 'create'])->name('tambah-data-mahasiswa');
        Route::POST('/import-data-mahasiswa', [MahasiswaController::class, 'import'])->name('import-data-mahasiswa');
    });
});

require __DIR__ .'\auth.php';
