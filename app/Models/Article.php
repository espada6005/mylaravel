<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model
{
    protected $fillable = ['subject', 'body', 'summary'];

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function memo(): MorphOne
    {
        return $this->morphOne(Memo::class, 'memoable');
    }

    protected function casts(): array
    {
        return [
            'body' => 'encrypted',
        ];
    }
}
