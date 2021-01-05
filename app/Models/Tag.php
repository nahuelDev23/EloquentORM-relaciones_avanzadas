<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function posts()
    {
         # muchos a muchos desde la tabla madre muchos a muchos(transformados por muchos = morphedByMany)
        return $this->morphedByMany(Post::class,'taggeable');
    }

    public function tags()
    {
        return $this->morphedByMany(Video::class,'taggeable'); # muchos a muchos con morphToMany
    }
}
