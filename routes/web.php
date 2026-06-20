<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CtrlController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MiddleController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/hello', [ HelloController::class, 'index' ]);

Route::controller(HelloController::class)->group(function () {
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
});

Route::controller(RelationController::class)->group(function () {
    Route::get('/relation/belong', 'belong');
    Route::get('/relation/has_many', 'hasMany');
    Route::get('/relation/has_one', 'hasOne');
    Route::get('/relation/belongs_many', 'belongsMany');
    Route::get('/relation/has_many_through', 'hasManyThrough');
    Route::get('/relation/latest_of_many', 'latestOfMany');
    Route::get('/relation/of_many', 'ofMany');
    Route::get('/relation/pivot', 'pivot');
    Route::get('/relation/morph_one', 'morphOne');
    Route::get('/relation/morph_many', 'morphMany');
    Route::get('/relation/morph_reverse', 'morphReverse');
    Route::get('/relation/morph_to_many', 'morphToMany');
    Route::get('/relation/rel_query', 'relQuery');
    Route::get('/relation/or_where', 'orWhere');
    Route::get('/relation/where_belong', 'whereBelong');
    Route::get('/relation/where_belong_multi', 'whereBelongMulti');
    Route::get('/relation/has', 'has');
    Route::get('/relation/where_has_morph', 'whereHasMorph');
    Route::get('/relation/with', 'with');
    Route::get('/relation/with_count', 'withCount');
    Route::get('/relation/with_count_alias', 'withCountAlias');
    Route::get('/relation/with_avg', 'withAvg');
    Route::get('/relation/save', 'save');
    Route::get('/relation/save_many', 'saveMany');
    Route::get('/relation/create', 'create');
    Route::get('/relation/push', 'push');
    Route::get('/relation/associate', 'associate');
    Route::get('/relation/attach', 'attach');
    Route::get('/relation/detach', 'detach');
    Route::get('/relation/sync', 'sync');
    Route::get('/relation/toggle', 'toggle');
    Route::get('/relation/update', 'update');
});

Route::controller(ModelController::class)->group(function () {
    Route::get('/model/accessor_basic', 'accessorBasic');
    Route::get('/model/accessor_multi', 'accessorMulti');
    Route::get('/model/mutator_basic', 'mutatorBasic');
    Route::get('/model/mutator_valid', 'mutatorValid');
    Route::get('/model/mutator_multi', 'mutatorMulti');
    Route::get('/model/cast_stringable', 'castStringable');
    Route::get('/model/cast_encrypt', 'castEncrypt');
    Route::get('/model/cast_array', 'castArray');
    Route::get('/model/cast_enum', 'castEnum');
    Route::get('/model/cast_address', 'castAddress');
});

Route::controller(CtrlController::class)->group(function () {
    Route::get('/ctrl/plain', 'plain');
    Route::get('/ctrl/header', 'header');
    Route::get('/ctrl/out_json', 'outJson');
    Route::get('/ctrl/model_json', 'modelJson');
    Route::get('/ctrl/download', 'download');
    Route::get('/ctrl/path_ng', 'pathNg');
    Route::get('/ctrl/download_stream', 'downloadStream');
    Route::get('/ctrl/redirect_basic', 'redirectBasic');
    Route::get('/ctrl/input', 'input');
    Route::get('/ctrl/input_type', 'inputType');
    Route::get('/ctrl/req_headers', 'reqHeaders');
    Route::get('/ctrl/upload_form', 'uploadForm');
    Route::post('/ctrl/upload_process', 'uploadProcess');
    Route::get('/ctrl/download_file/{photo}', 'downloadFile');
    Route::get('/ctrl/cookie_form', 'cookieForm');
    Route::post('/ctrl/cookie_process', 'cookieProcess');
    Route::get('/ctrl/delete_cookie', 'deleteCookie');
    Route::get('/ctrl/pdf', 'pdf');
});

Route::controller(CycleController::class)->group(function () {
    Route::view('/cycle/inject', 'cycle.inject');
    Route::get('/cycle/srv', 'srv');
    Route::get('/cycle/srv_multi', 'srvMulti');
    Route::get('/cycle/srv_my', 'srvMy');
    Route::get('/cycle/srv_tag', 'srvTag');
    Route::get('/cycle/facade_basic', 'facadeBasic');
});

Route::resource('reviews', ReviewController::class);

Route::controller(LogController::class)
    // ->middleware([LogMiddleware::class])
    // ->middleware(LogMiddleware::class)
    ->group(function () {
        Route::get('/log/log_basic', 'logBasic')->name('logBasic');
        // Route::get('/log/log_basic', 'logBasic')
        //     ->withoutMiddleware(LogMiddleware::class);
        Route::get('/log/trigger', 'trigger');
        Route::view('/log/transfer', 'log.transfer');
    });

Route::controller(RouteController::class)->group(function () {
    Route::post('/route/process', 'process');
    // Route::any('/route/any', 'any');

    Route::get('/route/param/{id?}', 'param');
    // Route::get('/route/param/{id}', 'param')
    //     ->where('id', '\d{3,5}');
    // ->where(['id' => '\d{3,5}']);
    // ->whereNumber('id');
    Route::get('/route/search/{keyword}', 'search')
        ->where('keyword', '.*');

    Route::prefix('admin')->group(function () {
        Route::get('/manage', 'manage');
        Route::get('/role', 'role');
    });
});

// Route::prefix('/admin')->controller(RouteController::class)->group(function () {
//   Route::get('/manage', 'manage');
//   Route::get('/role', 'role');
// });

// Route::middleware('throttle:3,1')->controller(RouteController::class)->group(function () {
//     Route::get('/manage', 'manage');
//     Route::get('/role', 'role');
// });

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

// Route::resource('articles', ArticleController::class)
//     ->only('index', 'show');
//     // ->only(['index', 'show']);
//     // ->name('index', 'articles')
//     // ->parameter('articles', 'id');

Route::resource('articles.comments', CommentController::class, [
    // 'shallow' => true
]);

// Route::controller(HelloController::class)
//     ->prefix('/hello')->group(function () {
//         Route::get('', 'index');
//         Route::get('/show', 'show');
//         Route::get('/list', 'list');
//     });

Route::name('hello.')->controller(HelloController::class)->group(function () {
    // Route::get('/hello', 'index')->name('index');
    //     Route::get('/hello/show', 'show')->name('show');
    //     Route::get('/hello/list', 'list')->name('list');
});

Route::view('/route/view', 'hello.show',
    ['message' => 'こんにちは、世界！']);

// Route::redirect('/articles/{id}', '/c/{id}');
// Route::get('/c/{id}', function ($id) {
//     return "記事id：{$id}";
// });

Route::get('/single', SingleController::class);

Route::controller(MiddleController::class)->group(function () {
    Route::get('/middle/index', 'index');
    Route::get('/middle/hoge', 'hoge');
});

// Route::get('/hello', [HelloController::class, 'index'])
//     ->middleware([LogMiddleware::class]);

// Route::resource('books', BookController::class)
//     ->middleware([LogMiddleware::class]);

// Route::get('/hello', [HelloController::class, 'index'])
//     ->middleware('exam');

// Route::get('/hello', [HelloController::class, 'index'])
//     ->middleware('log');

// 11章
Route::view('/i18n/greet', 'i18n.greet');

// Route::group(['prefix' => '/{locale}', 'middleware' => 'I18nMiddleware'], function () {
//     Route::view('/i18n/greet', 'i18n.greet');
// });

// Route::prefix('{locale}')
//     ->middleware(I18nMiddleware::class)
//     ->group(function () {
//         Route::view('/i18n/greet', 'i18n.greet');
//     });

Route::view('/i18n/hello', 'i18n.hello');
Route::view('/i18n/mail', 'i18n.mail');

Route::resource('members', MemberController::class);
Route::controller(OtherController::class)->group(function () {
    Route::get('/other/queue_name', 'queueName');
    Route::get('/other/subscribe_event','subscribeEvent');
});

Route::fallback(function () {
    return view('route.404');
});

