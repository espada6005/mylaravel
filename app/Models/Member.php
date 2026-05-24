<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'name_kana',
        'password',
        'email',
        'prefecture',
        'city',
        'other',
        'dm',
        'roles',
        'info',
    ];

    protected function casts(): array
    {
        // 【注意】該当のサンプルを試した後は、元の設定に戻す必要があります
        return [
            'roles' => 'array',
            // 'roles' => AsEnumArrayObject::of(Role::class),

            // 'email' => AsStringable::class,
            'info' => 'array',
            // 'info' => AsArrayObject::class,

            // 'debut' => 'date',
            // 'password' => HashType::class,

            // 自作のキャストクラスを使う場合
            // 'address' => AddressType::class,

            // 値オブジェクトそのものにキャスト機能を実装する場合
            // 'address' => Address::class,
        ];
    }
}
