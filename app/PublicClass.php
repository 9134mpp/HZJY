<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicClass extends Model
{
    //
    protected $fillable = [
        'img', 'video','title','content','teacher','onclick','status'
    ];
}
