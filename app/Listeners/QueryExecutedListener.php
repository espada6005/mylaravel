<?php

namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class QueryExecutedListener
{
    public function __construct()
    {
        //
    }

    public function handle(QueryExecuted $event): void
    {
        $excluded = ['cache', 'jobs', 'sessions', 'logs'];
        if (collect($excluded)->contains(fn($v) => Str::contains($event->sql, $v))) {
            return;
        }

        Log::info($event->sql, $event->bindings);
    }
}
