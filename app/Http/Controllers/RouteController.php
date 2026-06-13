<?php

namespace App\Http\Controllers;

use App\Models\Status;

class RouteController extends Controller
{
    public function param(int $id = 1)
    {
        return "id値：{$id}";
    }

    // public function param(Status $id)
    // {
    //     return "id値：{$id->name}";
    // }

    public function search(string $keyword)
    {
        return "検索ワード：{$keyword}";
    }

    public function manage()
    {
        return '管理ページです。';
    }

    public function role()
    {
        return 'ロールの管理ページです。';
    }
}
