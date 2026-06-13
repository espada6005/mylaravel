<?php

namespace App\Services;

class NightMessage implements MessageInterface
{
    public function getMessage(): string
    {
        return 'Good night!';
    }
}
