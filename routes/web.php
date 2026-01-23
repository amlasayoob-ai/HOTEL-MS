<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShihamControlller;

// Public routes
Route::get('/', function () {
    return view('home');
});

Route::get('/user-register', [ShihamControlller::class, 'userReg'])->name('reg.view');
Route::post('/user-reg', [RegisterController::class, 'register'])->name('reg.submit');

Route::get('/login', [LoginController::class, 'loginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Test routes
Route::get('/test', function () {
    return "Test route working!";
});

Route::get('/simple-register', function () {
    return "Simple register page (no protection)";
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/app', [ShihamControlller::class, 'apppage'])->name('app');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Admin routes with admin middleware
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/register', [RegisterController::class, 'registerForm'])
            ->name('register.form');

        Route::post('/register', [RegisterController::class, 'register'])
            ->name('register.submit');
    });
});
