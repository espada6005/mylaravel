<?php

namespace App\Services;

class FixIdService implements UuidInterface
{
    private $id;

    public function __construct()
    {
        $this->id = 'FIXED-ID-12345';
    }

    public function getId(): string
    {
        return $this->id;
    }
}
