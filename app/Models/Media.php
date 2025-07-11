<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $primaryKey = 'media_id';

    public $timestamps = true;

    protected $fillable = [
        'file_name', 
        'file_path', 
        'mime_type', 
        'size'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_media')->withPivot('order')->orderBy('order');
    }
}
