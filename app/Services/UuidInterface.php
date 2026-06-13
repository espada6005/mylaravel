<?php

namespace App\Services;

use Illuminate\Container\Attributes\Bind;
use Illuminate\Container\Attributes\Scoped;
use Illuminate\Container\Attributes\Singleton;

// #[Bind(UuidService::class)]
// #[Bind(FixIdService::class, environments: ['local', 'testing'])]
// #[Singleton]
// #[Scoped]
interface UuidInterface
{
    function getId(): string;
}
