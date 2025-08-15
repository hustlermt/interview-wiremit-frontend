<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertController;

Route::prefix('dashboard/adverts')->middleware(['auth'])->group(function () {
    Route::get('/', [AdvertController::class, 'adverts'])->name('adverts');
    Route::post('/store', [AdvertController::class, 'store'])->name('admin.adverts.store');
    Route::get('/create-advert', [AdvertController::class, 'create'])->name('adverts.add');
    Route::delete('/{id}', [AdvertController::class, 'destroy'])->name('admin.adverts.delete');
    Route::put('/update/{id}', [AdvertController::class, 'update'])->name('admin.adverts.update');
    Route::get('/{id}/edit', [AdvertController::class, 'edit'])->name('admin.adverts.edit');

});