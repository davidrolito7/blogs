<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

 /**
     * Get the post's image.
     */
    public function images(): hasMany
    {
        return $this->hasMany(Image::class);
    }

    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }
    
};
