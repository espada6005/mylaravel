<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    use HasFactory;

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function books(): BelongsToMany
    {
        // return $this->belongsToMany(Book::class);
        return $this->belongsToMany(Book::class)
            ->withPivot('hidden', 'order');
    }

    protected function casts(): array
    {
        return [
            'debut' => 'date',
        ];
    }
}
