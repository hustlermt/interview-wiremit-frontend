<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;


Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [LoginController::class, 'admin'])->name('admin');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('guest')->group(function () {
    
    Route::get('/create-account', [RegisterController::class, 'signup'])->name('signup');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'forgot'])->name('forgot');
    Route::get('/reset-password', [ResetPasswordController::class, 'showResetForm'])->name('reset.form');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('reset');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/forgot-old-password', [ForgotPasswordController::class, 'handleForgot'])->name('forgot.handle');
    
});
