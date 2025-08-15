<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMoneyController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [LoginController::class, 'login'])->name('login');

Route::prefix('/dashboard')->middleware(['auth'])->group(function () {
    Route::post('/process-transfer', [SendMoneyController::class, 'store'])->name('send.money');
    Route::get('/send-money', [SendMoneyController::class, 'create'])->name('page.send.money');
    Route::get('/payments', [SendMoneyController::class, 'payments'])->name('page.payments');        
});

   

