<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\UuidInterface;

class Uuid extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UuidInterface::class;
        // return 'uuid';
    }
}
