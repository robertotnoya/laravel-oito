<?php

use Illuminate\Support\Facades\Route;

Route::get('/contato', function () {
    return view('contato');
});


Route::get('/', function () {
    return view('welcome');
});
