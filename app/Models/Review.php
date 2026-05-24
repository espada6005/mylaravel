<?php

namespace App\Models;

use App\Models\Scopes\NewOrderScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Validation\Rule;

// #[ScopedBy([NewOrderScope::class])]
class Review extends Model
{
    use HasFactory;
    use Prunable;

    protected $fillable = [
        'book_id',
        'member_id',
        'status',
        'rate',
        'body',
    ];

    public function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subYears(5));
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
        // return $this->belongsTo(Book::class, 'f_isbn', 'isbn');
        // return $this->belongsTo(Book::class, 'f_isbn');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    protected function casts(): array
    {
        return [
            'status' => Status::class,
        ];
    }

    // public static function rules(): array
    // {
    //     return [
    //         'status' => [Rule::enum(Status::class)
    //             // ->only([Status::Draft, Status::Published])
    //         ]
    //     ];
    // }

    protected static function booted(): void
    {
         static::addGlobalScope('newer', function (Builder $builder) {
             $builder->orderBy('created_at', 'desc');
         });
    }

}
