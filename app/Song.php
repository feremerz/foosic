<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable=[
        'slug','name','release_date','lyrics','likeCount','viewCount','status','album_id','duration','album_id'
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
