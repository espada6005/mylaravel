<?php

use Illuminate\Support\Facades\Route;

// 「/api/sample」でアクセス可能
Route::get('/sample', function () {
    return response()->json([1, 2, 3]);
});