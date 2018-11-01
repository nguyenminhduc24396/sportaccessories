<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Comment;
use App\User;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'thumbnail',
        'slug',
        'status',
        'crated_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
