<?php

use App\Http\Controllers\ProductControllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
route::resource('products',ProductControllers::class);
