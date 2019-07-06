<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable=[
        'name','slug','art_id','instagram','telegram','description','likeCount','status'
    ];

    public function categories()
    {
        return $this->morphToMany(Category::class,'categorizable')->withTimestamps();
    }
    public function photo()
    {
        return $this->morphOne(Photo::class,'photosable');
    }
}
