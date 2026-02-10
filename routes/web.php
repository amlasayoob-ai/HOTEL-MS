<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShihamControlller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;



Route::get('/', function () {
    return view('home');
});

Route::get('/user-register', [ShihamControlller::class, 'userReg'])
    ->name('reg.view');

Route::post('/user-reg', [UserController::class, 'store'])
    ->name('register.store');

Route::get('/login', [LoginController::class, 'loginForm'])
    ->name('login.form');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/app', [ShihamControlller::class, 'apppage'])
        ->name('app');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');



    Route::middleware('admin')->prefix('admin')->group(function () {

        // Admin register
        Route::get('/register', [RegisterController::class, 'registerForm'])
            ->name('register.form');

        Route::post('/register', [RegisterController::class, 'register'])
            ->name('register.submit');

        // Users
        Route::get('/user-table', [RegisterController::class, 'getTable'])
            ->name('admin.user.table');

        Route::get('/users', [RegisterController::class, 'index'])
            ->name('users.index');

        Route::put('/users/{id}', [RegisterController::class, 'update'])
            ->name('users.update');

        Route::delete('/users/{id}', [RegisterController::class, 'destroy'])
            ->name('users.destroy');


        Route::get('/rooms', [RoomController::class, 'index'])
            ->name('admin.rooms');

        Route::post('/room.save', [RoomController::class, 'store'])
            ->name('room.submit');

        Route::put('/rooms/{id}', [RoomController::class, 'update'])
            ->name('rooms.update');

        Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])
            ->name('rooms.destroy');
    });

    Route::middleware('user')->prefix('user')->group(function () {});
});
