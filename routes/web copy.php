<?php

use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//PRODUCTS//
Route::get('/products/index',[ProductController::class, 'index'])->name('products.index');
Route::get('/products/create',[ProductController::class, 'create'])->name('products.create');
Route::post('/products/store',[ProductController::class, 'store'])->name('products.store');
Route::get('/products/edit/{id}',[ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/update/{id}',[ProductController::class, 'update'])->name('products.update');
Route::get('/products/show/{id}',[ProductController::class, 'show'])->name('products.show');
Route::delete('/products/destroy/{id}',[ProductController::class, 'destroy'])->name('products.destroy');


