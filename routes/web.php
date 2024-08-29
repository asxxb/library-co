<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');
// routes/web.php
Route::middleware(['auth'])->group(function () {


    Route::get('/', [BookController::class, 'index'])->name('home');
    Route::resource('books', BookController::class);
});

require __DIR__ . '/auth.php';
