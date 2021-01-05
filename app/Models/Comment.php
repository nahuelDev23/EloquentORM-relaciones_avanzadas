<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    public function commentable()
    {
        return $this->morphedTo(); # uno a uno y uno a muchos usa morphedTo, en cambio de muchos a muchos usa morphedByMany como en Tag
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
