<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Book extends Model
{

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
