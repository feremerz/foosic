<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=[
      'url','photosable_type','photosable_id'
    ];

    public function photoable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute($value)
    {
        if(!empty($value))
            return "images/profiles/" . $value;
        else
            return "https://dummyimage.com/80x80/dbd8db/fff.jpg&text=Avatar";
    }
}
