<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable=[
      'url','file_size','type','fileable_id','fileable_type'
    ];

}
