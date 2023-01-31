<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// Register
Route::get('/register', [RegisterController::class, 'register'])->name('register.register');
Route::post('/register-post', [RegisterController::class, 'registerPost'])->name('register.post');


// Login
Route::get('/login', [LoginController::class, 'login'])->name('login.login');
Route::post('/login-post', [LoginController::class, 'loginPost'])->name('login.post');