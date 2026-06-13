<?php

namespace App\Http\Controllers;

class SingleController extends Controller
{
    public function __invoke()
    {
        return 'シングルアクションコントローラー';
    }
}