<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsInboundAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class HashType implements CastsInboundAttributes
{
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return Hash::make($value);
    }
}
