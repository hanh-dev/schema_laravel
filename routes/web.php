<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('/products', ProductController::class);
Route::get('/products', [PageController::class, 'index']);

// Route::get('/products', [ProductController::class, 'index']);
