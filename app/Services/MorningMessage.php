<?php

namespace App\Services;

class MorningMessage implements MessageInterface
{
    public function getMessage(): string
    {
        return 'Good morning!';
    }
}
