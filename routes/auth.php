<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::GET('/login', [AuthController::class, 'login'])->name('login');
Route::POST('/login', [AuthController::class, 'authenticate'])->name('login');
Route::GET('/logout', [AuthController::class, 'logout'])->name('logout');
