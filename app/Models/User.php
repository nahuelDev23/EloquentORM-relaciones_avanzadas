<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class); # un usuario __tiene  un__ perfil
    }

    public function level()
    {
        return $this->belongsTo(Level::class); # un nivel __pertenece__ a un usuario
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps(); # un usuario tiene y pertenece a muchos grupos (muchos a muchos)
    }

    public function location()
    {
        return $this->hasOneThrough(Location::class, Profile::class); # usuario tiene una localizacion a travez de perfil
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class); 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); 
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable'); # un usuario tiene una imagen de perfil (image es polimorfico por eso uso morphOne en vez de hasOne)
    }
}
