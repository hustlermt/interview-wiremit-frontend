<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

require __DIR__ . '/admin/auth.php';
require __DIR__ . '/admin/adverts.php';
require __DIR__ . '/admin/main.php';

Route::get('/', [LoginController::class, 'login'])->name('login');




