<?php

namespace App\Services;

class MyService
{
    private string $type;
    private UuidInterface $uuidService;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    // public function __construct(UuidInterface $uuidService)
    // {
    //     $this->uuidService = $uuidService;
    // }

    public function getType(): string
    {
        return $this->type;
    }

    public function generateId(): string
    {
        return $this->uuidService->getId();
    }

    public function getServiceType(): string
    {
        return get_class($this->uuidService);
    }
}
