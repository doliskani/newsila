<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SavedAddress extends Eloquent
{
    protected $fillable = array(
        'url',
        'domain',
        'source',
        'lang',
        'urls',
        'images',
        'allowed',
        'domain_added',
    );

    protected $casts = [
        'urls' => 'array',
        'images' => 'array',
    ];
}
