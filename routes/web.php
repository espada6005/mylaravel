<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ViewController;
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

Route::controller(ViewController::class)->group(function () {
    Route::get('/view/escape', 'escape');
    Route::get('/view/show_double', 'showDouble');
    Route::get('/view/show_switch', 'showSwitch');
    Route::get('/view/assoc/{id}', 'assoc');
    Route::get('/view/foreach_loop', 'foreachLoop');
    Route::get('/view/set_class', 'setClass');
    Route::get('/view/set_style', 'setStyle');
    Route::get('/view/selected', 'selected');
    Route::view('/view/directive', 'view.directive');
    Route::view('/view/date', 'view.date');
    Route::view('/view/helper', 'view.helper');
    Route::get('/view/comp_basic', 'compBasic');
    Route::view('/view/slot_named', 'view.slot_named');
    Route::view('/view/slot_layout', 'view.slot_layout');
    Route::get('/view/slot_template', 'slotTemplate');
    Route::view('/view/stack', 'view.stack');
    Route::view('/view/comp_index', 'view.comp_index');
    Route::view('/view/comp_inline', 'view.comp_inline');
    Route::get('/view/comp_dynamic', 'compDynamic');
    Route::get('/view/collection', 'collection');
    Route::view('/view/compose', 'view.compose');
    Route::get('/view/creator', 'creator');
});