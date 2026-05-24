<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model {
    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }
}
