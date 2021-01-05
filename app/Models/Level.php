<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class); # muchos usuarios tienen un nivel
    }

    public function posts()
    {
        return $this->hasManyThrough(Post::class,User::class); # tengo muchos post a travez de user
    }

    public function videos()
    {
        return $this->hasManyThrough(Video::class,User::class); # tengo muchos post a travez de user
    }
}
