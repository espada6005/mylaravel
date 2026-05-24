<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    use HasFactory;
    // use HasUuids;
    use Prunable;

    protected $fillable = [ 'isbn', 'title', 'price', 'publisher',
        'published', 'sample' ];

    protected $attributes = [
        'price' => 3000,
        'publisher' => 'SBクリエイティブ',
        'sample' => false,
    ];

    // protected $primaryKey = 'isbn';
    // protected $keyType = 'string';
    // public $incrementing = false;
    // protected $hidden = ['id', 'deleted_at'];

    // protected $with = ['reviews'];
    // protected $with = ['reviews', 'authors'];
    // protected $with = ['reviews', 'memo'];

    public function prunable(): Builder
    {
        return static::where('created_at', '<=', now()->subYears(5));
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
        // return $this->hasMany(Review::class, 'f_isbn', 'isbn');
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
        // return $this->belongsToMany(Author::class)
        //     ->withPivot('hidden', 'order');
        // return $this->belongsToMany(Author::class)->withTimestamps();
        // return $this->belongsToMany(Author::class)
        //     ->wherePivot('hidden', false);
        // return $this->belongsToMany(Author::class)
        //     ->orderByPivot('order');
    }

    public function memo(): MorphOne
    {
        return $this->morphOne(Memo::class, 'memoable');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(Comment::class, Review::class);
    }

    protected function casts(): array
    {
        return [
            'published' => 'datetime:Y-m-d',
        ];
    }

    #[Scope]
    protected function sbc(Builder $query): void
    {
        $query->where('publisher', 'SBクリエイティブ');
    }

    #[Scope]
    protected function newer(Builder $query, int $number): void
    {
        $query->orderBy('published', 'desc')->limit($number);
    }

    #[Scope]
    protected function sbcNewer(Builder $query): void
    {
        $query->sbc()->newer(5);
    }
}
