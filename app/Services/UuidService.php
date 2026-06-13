<?php

namespace App\Services;

use Illuminate\Support\Str;

class UuidService implements UuidInterface
{
    private $id;

    public function __construct()
    {
        $this->id = Str::uuid()->toString();
    }

    public function getId(): string
    {
        return $this->id;
    }
}
