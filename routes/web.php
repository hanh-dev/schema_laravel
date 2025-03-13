<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.trangchu');
});

// Route::resource('/products', ProductController::class);

Route::get('/home', [PageController::class, 'index']);
Route::get('/add_to_cart', [PageController::class, 'addCart'])->name('themgiohang');
Route::get('/type/{id}', [PageController::class, 'getLoaiSp']);
Route::get('/detail/{id}', [PageController::class, 'getDetail']);			

// Route::get('/products', [ProductController::class, 'index']);
