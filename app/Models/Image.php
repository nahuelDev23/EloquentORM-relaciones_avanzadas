<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function imageable()
    {
        return $this->morphedTo();  # uno a uno y uno a muchos usa morphedTo, en cambio de muchos a muchos usa morphedByMany como en Tag
    }
}
