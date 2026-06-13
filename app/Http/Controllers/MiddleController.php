<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\LogMiddleware;
use App\Http\Middleware\UpperMiddleware;


class MiddleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        // return [LogMiddleware::class, UpperMiddleware::class];

        // return [
        //     new Middleware(LogMiddleware::class, only: ['index']),
        //     new Middleware(UpperMiddleware::class, except: ['hoge']),
        // ];

        return [
            function (Request $request, Closure $next) {
                Log::info("【" . date('Y-m-d H:i:s') . "】 " . $request->path());
                return $next($request);
            },
            new Middleware(
                function (Request $request, Closure $next) {
                    $response = $next($request);
                    $response->setContent(
                        mb_convert_case($response->getContent(), MB_CASE_UPPER)
                    );
                    return $response;
                },
                except: ['hoge']
            ),
        ];
    }

    public function index()
    {
        return 'index';
    }
    public function hoge()
    {
        return 'hoge';
    }
}
