<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Source extends Eloquent
{
    protected $fillable = [
        'name',
        'category',
        'feed',
        'lang',
        'read',
    ];

    protected $casts = [
      'feed' => 'array'
    ];


}
