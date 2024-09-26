<?php

use App\Http\Controllers\Informasi\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function(){
    return view('admin.dashboard.index');
});

Route::get('/data-mahasiswa', [MahasiswaController::class, 'index'])->name('data-mahasiswa');
Route::get('/tambah-data-mahasiswa', [MahasiswaController::class, 'index'])->name('tambah-data-mahasiswa');

require __DIR__ .'\auth.php';
