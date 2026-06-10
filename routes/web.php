<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductControllers;
use Illuminate\Support\Facades\Route;

//halaman utama langsung login
Route::get('/',[AuthController::class,'showLogin'])->name('login');
route::post('/login', [AuthController::class,'Login'])->name('login.process');
route::post('/logout', [AuthController::class,'logout'])->name('logout');

//protect halaman prdocuts supaya 
Route::middleware('auth')->group(function(){
    route::resource('products',ProductControllers::class);
});
