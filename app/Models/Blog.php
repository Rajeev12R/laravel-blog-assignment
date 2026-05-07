<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
        'title',
        'slug',
        'image',
        'short_description',
        'content',
        'category_id',
        'published_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
