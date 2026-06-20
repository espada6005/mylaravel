<?php

namespace App\Listeners;

use App\Events\Hoge;
use App\Events\Foo;
use Illuminate\Support\Facades\Log;

class HogeSubscriber
{
    public function handleHoge(Hoge $event): void
    {
        Log::info('Hoge event handled in HogeSubscriber');
    }

    public function handleFoo(Foo $event): void
    {
        Log::info('Foo event handled in HogeSubscriber');
    }
}
