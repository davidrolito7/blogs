<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Image extends Model
{
    /**
     * Get the parent imageable model (user or post).
     */
    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
