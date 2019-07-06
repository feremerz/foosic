<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable=[
      'name','release_date','price','slug'
    ];

    public function artists()
    {
        return $this->belongsToMany(Artist::class)->withTimestamps();
    }
}
