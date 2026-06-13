<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info("【" . date('Y-m-d H:i:s') . "】 " . $request->path());

        // $request->merge([
        //     'title' => 'Laravel実践入門',
        //     'author' => 'Y.Yamada'
        // ]);
        return $next($request);
    }
}
