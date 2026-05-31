<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    protected $attributes = [
        'dm' => false,
        'info' => '{}',
    ];

    // protected $dispatchesEvents = [
    //     'created' => MemberRegistered::class,
    // ];

    // protected static function booted(): void
    // {
    //     static::created(function (Member $member) {
    //         Mail::to($member->email)
    //             ->send(new MemberCreated($member));
    //     });
    // }

    public function author(): HasOne
    {
        return $this->hasOne(Author::class);
//         return $this->hasOne(Author::class)->withDefault([
//             'pen_name' => '不明'
//         ]);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function latestReview(): HasOne
    {
        return $this->hasOne(Review::class)->latestOfMany();
        // return $this->hasOne(Review::class)->oldestOfMany();
    }

    public function bestReview(): HasOne
    {
        return $this->hasOne(Review::class)->ofMany('rate', 'max');
//         return $this->hasOne(Review::class)->ofMany([
//             'rate' => 'max',
//             'id' => 'min'
//         ]);
        // return $this->reviews()->one()->ofMany('rate', 'max');
        // return $this->hasOne(Review::class)->ofMany(
        //     ['rate' => 'max'],
        //     function (Builder $query) {
        //         $query->where('status', 'published');
        //     }
        // );
    }

    public function memos(): MorphMany
    {
        return $this->morphMany(Memo::class, 'memoable');
    }

    protected function formattedName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attrs) =>
            "{$attrs['name']} （{$attrs['name_kana']}）"
        );
    }

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
