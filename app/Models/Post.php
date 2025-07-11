<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\PostStatus;

class Post extends Model
{
    protected $table = 'posts';

    protected $primaryKey = 'post_id';

    public $timestamps = true;

    protected $casts = [
        'status' => PostStatus::class,
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id');
    }

    public function media()
    {
        return $this->belongsToMany(Media::class, 'post_media')->withPivot('order')->orderBy('order');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'target_id')->where('target_type', 'post');
    }

}
