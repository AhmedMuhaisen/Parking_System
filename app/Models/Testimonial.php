<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{

           function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

}
