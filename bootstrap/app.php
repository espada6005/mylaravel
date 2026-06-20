<?php

use App\Http\Middleware\LogMiddleware;
use App\Http\Middleware\UpperMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
//        $middleware->append(LogMiddleware::class);
//        $middleware->append(UpperMiddleware::class);

        // $middleware->group('exam', [
        //     LogMiddleware::class,
        //     UpperMiddleware::class,
        // ]);

        // $middleware->encryptCookies(except: ['email']);
        // $middleware->append(I18nMiddleware::class);

        // $middleware->web(
        //     append: [LogMiddleware::class],
        //     replace: [EncryptCookies::class => CustomCookies::class]
        // );

        // $middleware->alias([
        //     'log' => LogMiddleware::class,
        // ]);

        // $middleware->append(AdvancedLogMiddleware::class . ':info,MyApp');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
