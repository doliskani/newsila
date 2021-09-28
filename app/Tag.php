<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Tag extends Eloquent
{
    protected $fillable = [
        'title'  ,
        'title_seo'  ,
        'keyword_seo'  ,
        'description_seo'  ,
        'slug'  ,
    ];

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function path()
    {
        return "/tags/$this->slug";
    }
}
