<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class); # una categoria tiene muchos post
    }

    public function videos()
    {
        return $this->hasMany(Video::class); # una categoria tiene muchos videos
    }
}
