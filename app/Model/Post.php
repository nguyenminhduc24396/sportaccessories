<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Comment;
use App\Model\User;

class Post extends Model
{
    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
