<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UuidInterface;
use App\Services\UuidService;
use App\Services\FixIdService;
use App\Services\MyService;
use App\Services\MessageInterface;
use App\Services\MorningMessage;
use App\Services\NightMessage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;

class MyServiceProvider extends ServiceProvider /*implements DeferrableProvider*/
{
    // public $bindings = [
    //     UuidInterface::class => UuidService::class,
    //     MessageInterface::class => MorningMessage::class,
    // ];

    public function register(): void
    {
//        $this->app->bind(UuidInterface::class, UuidService::class);
        // $this->app->bind(UuidInterface::class, FixIdService::class);
//         $this->app->bind(UuidInterface::class, function (Application $app) {
//             return new UuidService();
//         });
        $this->app->singleton(UuidInterface::class, UuidService::class);
        $this->app->when(MyService::class)
            ->needs('$type')
            ->give('custom');

        $this->app->tag([MorningMessage::class, NightMessage::class], 'messages');

        // $this->app->bind('uuid', UuidService::class);
    }


    public function boot(): void
    {
    }

    public function provides()
    {
        return [MessageInterface::class, UuidInterface::class];
    }
}
