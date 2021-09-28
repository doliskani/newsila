<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Advertisement extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'url',
        'image',
        'position',
        'ad_number',
        'publish',
        'category_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
