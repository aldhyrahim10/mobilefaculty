<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'post_category_id',
        'title',
        'slug',
        'content',
        'image',
        'tags'
    ];

    public function postCategory() {
        return $this->belongsTo(PostCategory::class);
    }
}
