<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/hello', [ HelloController::class, 'index' ]);

Route::controller(HelloController::class)->group(function() {
    Route::get('/hello', 'index');
    Route::get('/hello/show', 'show');
    Route::get('/hello/list', 'list');
    Route::get('/hello/conf', 'conf');
});

Route::resource('books', BookController::class);