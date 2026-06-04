<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use InvalidArgumentException;

class AddressType implements CastsAttributes
{
    public function get(Model $model,
                        string $key, mixed $value, array $attrs): Address
    {
        return new Address($attrs['prefecture'],
            $attrs['city'], $attrs['other']);
    }

    public function set(Model $model,
                        string $key, mixed $value, array $attrs): array
    {
        if (!$value instanceof Address) {
            throw new InvalidArgumentException('Value must be Address type');
        }
        return [
            'prefecture' => $value->prefecture,
            'city' => $value->city,
            'other' => $value->other
        ];
    }
}
