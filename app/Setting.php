<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Setting extends Eloquent
{
    protected $fillable = [
        'index_title_seo',
        'index_description_seo',
        'index_keyword_seo',
    ];


}
