<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable=[
        'singer_id','name','imageUrl','lyrics','likeCount','dislikeCount','viewCount','status'
    ];

    public function signer()
    {
        return $this->hasOne(Artist::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
