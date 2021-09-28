<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Category extends Eloquent
{
    protected $fillable = [
        'title'  ,
        'title_seo'  ,
        'keyword_seo'  ,
        'description_seo'  ,
        'icon_class'  ,
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

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function advertisement()
    {
        return $this->hasOne(Advertisement::class);
    }

    public function threePosts()
    {
        return $this->belongsToMany(Post::class)
            ->take(3);
    }

    public function path()
    {
        return "/categories/$this->slug";
    }
}
