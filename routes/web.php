<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductControllers;
use Illuminate\Support\Facades\Route;

//halaman utama langsung login
Route::get('/',[AuthController::class,'showLogin'])->name('login');
route::post('/login', [AuthController::class,'Login'])->name('login.process');
route::resource('products',ProductControllers::class);
