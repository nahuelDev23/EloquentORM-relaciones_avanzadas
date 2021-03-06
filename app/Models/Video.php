<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class); # un video pertenece a un usuario
    }
    public function category()
    {
        return $this->belongsTo(Category::class); # un video pertenece a una categoria
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable'); # un video tiene muchos comentarios (comment es polimorfico por eso uso morphMany en vez de hasMany)
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable'); # un video tiene una imagen (image es polimorfico por eso uso morphOne en vez de hasOne)
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggeable'); # muchos a muchos con morphToMany (un video tiene y pertenece a muchos tags)
    }
}
