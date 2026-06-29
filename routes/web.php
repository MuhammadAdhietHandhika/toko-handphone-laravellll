<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductControllers;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


//halaman utama langsung login
Route::get('/',[AuthController::class,'showLogin'])->name('login');
route::post('/login', [AuthController::class,'Login'])->name('login.process');
route::post('/logout', [AuthController::class,'logout'])->name('logout');

//protect halaman prdocuts supaya 
Route::middleware('auth')->group(function(){

    Route::get('/products/download-pdf',
        [ProductControllers::class,'downloadPdf'])
        ->name('products.pdf');

    Route::resource('products', ProductControllers::class);

    // Tambahkan ini
    Route::resource('transactions', TransactionController::class);

});
