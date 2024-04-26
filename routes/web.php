<?php

use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function (){
    return view('inicio');
});


Route::get('/products',[ProductController::class, 'index']);

