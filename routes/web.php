<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ReviewController;
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

Route::controller(QueryController::class)->group(function () {
    Route::get('/query/where', 'where');
    Route::get('/query/json', 'json');
    Route::get('/query/where_and', 'whereAnd');
    Route::get('/query/where_or', 'whereOr');
    Route::get('/query/where_and_or', 'whereAndOr');
    Route::get('/query/where_not', 'whereNot');
    Route::get('/query/where_any', 'whereAny');
    Route::get('/query/where_avg', 'whereAvg');
    Route::get('/query/where_exists', 'whereExists');
    Route::get('/query/order', 'order');
    Route::get('/query/order_reset', 'orderReset');
    Route::get('/query/random_order', 'randomOrder');
    Route::get('/query/latest', 'latest');
    Route::get('/query/limit', 'limit');
    Route::get('/query/page/{id?}', 'page');
    Route::get('/query/pager', 'pager');
    Route::get('/query/select', 'select');
    Route::get('/query/select_raw', 'selectRaw');
    Route::get('/query/distinct', 'distinct');
    Route::get('/query/groupby', 'groupby');
    Route::get('/query/having', 'having');
    Route::get('/query/union', 'union');
    Route::get('/query/search', 'search');
    Route::get('/query/sub_single', 'subSingle');
    Route::get('/query/sub_multi', 'subMulti');
    Route::get('/query/scoped_local', 'scopedLocal');
    Route::get('/query/scoped_global', 'scopedGlobal');
    Route::get('/query/scoped_without', 'scopedWithout');
    Route::get('/query/create_id', 'createId');
    Route::get('/query/insert_or', 'insertOr');
    Route::get('/query/upsert', 'upsert');
    Route::get('/query/create_first', 'createFirst');
    Route::get('/query/update_all', 'updateAll');
    Route::get('/query/update_json', 'updateJson');
    Route::get('/query/destroy', 'destroy');
    Route::get('/query/with_trashed', 'withTrashed');
    Route::get('/query/only_trashed', 'onlyTrashed');
    Route::get('/query/force_delete', 'forceDelete');
    Route::get('/query/restore', 'restore');
    Route::get('/query/trans', 'trans');

    Route::resource('reviews', ReviewController::class);

    Route::resource('articles', ArticleController::class, [
        // 'only' => ['index', 'show']

        // 'except' => ['create', 'store', 'edit', 'update', 'destroy'],

        // 'names' => [
        //     'index' => 'articles',
        //     'show' => 'articles.detail'
        // ],

        // 'parameters' => [
        //     'articles' => 'id'
        // ],

        // 'wheres' => [
        //     'article' => '\d{3,5}'
        // ]
    ]);

});
