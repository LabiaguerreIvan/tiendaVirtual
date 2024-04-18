<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function (){
    return view('inicio');
});

// Route::get('/inicio', function (){
//     return view('inicio');
// })->middleware(('adsfafsa: afdfaas')); // <-- Middleware asigna relevancia a la ruta o funcion especificada