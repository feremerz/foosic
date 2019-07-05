<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable=[
        'slug','name','release_date','lyrics','likeCount','dislikeCount','viewCount','status','album_id'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class,'categorizable');
    }

    public function files()
    {
        return $this->morphToMany(File::class,'fileable');
    }
}
