<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable=[
        'slug','name','release_date','lyrics','likeCount','viewCount','status','duration','album_id','is_album','user_id','price','engName'
    ];

    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class,'categorizable')->withTimestamps();
    }

    public function files()
    {
        return $this->morphMany(File::class,'fileable');
    }
    public function photo()
    {
        return $this->morphMany(Photo::class,'photosable');
    }
}
