<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    protected $fillable = [
        'title',
        'slug',
        'date',
        'source',
        'url',
        'lang',
        'count_likes',
        'count_dislikes',
        'count_views',
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

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function path()
    {
        return "/$this->slug";
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->ago();
    }

    public function scopeRemovePostHasSpecialChars($query)
    {
        return $query->where('title' , 'not regexp' , '/&amp/')
               ->where('title' , 'not regexp' , '/apos/')
               ->where('title' , 'not regexp' , '/href/');
    }

    public function scopeSearch($query, $obj)
    {

        if (strlen($obj->phrase)) {
            $query->where('title', 'like', "%$obj->phrase%");
        }
        if (strlen($obj->has_words)) {
            $query->where('title', 'like', "%$obj->has_words%");
        }
        if (strlen($obj->website)) {
            $query->where('source', 'like', "%$obj->website%");
        }
        if (strlen($obj->exclude_words)) {
            $query->where('title', 'not regexp', "/$obj->exclude_words/i");
        }
        if (strlen($obj->date)) {
            if ($obj->date == "AnyTime") {
                $query->latest();
            } else {
                if ($obj->date == "PastHour") {
                    $from = Carbon::now()->subHour();
                } elseif ($obj->date == "Past24Hour") {
                    $from = Carbon::now()->subDay();
                } elseif ($obj->date == "PastWeek") {
                    $from = Carbon::now()->subWeek();
                } elseif ($obj->date == "PastYear") {
                    $from = Carbon::now()->subYear();
                }
                $query->where('created_at', '>', $from)->orderBy('created_at', 'desc');
            }

        }

        return $query;
    }
}
