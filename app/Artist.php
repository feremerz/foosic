<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $fillable=[
        'fname','lname','imageUrl','instagarm','telegram','description','likeCount','dislikeCount','status'
    ];
}
