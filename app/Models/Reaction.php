<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ReactionType;

class Reaction extends Model
{
    protected $table = 'reactions';

    protected $primaryKey = 'reaction_id';

    public $timestamps = true;

    protected $casts = [
        'reaction_type' => ReactionType::class,
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'user_id', 
        'target_id', 
        'target_type', 
        'reaction_type'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
