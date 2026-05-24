<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'memoable_id', 'memoable_type'];

    public function memoable(): MorphTo
    {
        return $this->morphTo();
        // return $this->morphTo(__FUNCTION__, 'memoable_type', 'memoable_id');
    }
}
