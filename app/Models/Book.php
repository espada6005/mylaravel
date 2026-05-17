<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Override;

class Book extends Model
{

    // use SoftDeletes;
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
    
    #[Override]
    protected function casts()
    {
        return [
            'published' => 'datetime:Y-m-d',
        ];
    }
}
