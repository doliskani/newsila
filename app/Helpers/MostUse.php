<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 9/12/2019
 * Time: 10:40 AM
 */

namespace App\Helpers;


use App\Category;
use App\Post;
use App\Source;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class MostUse
{

    public static function saveCategories()
    {
        $cat_names = [
            ['world', 'fa-globe'],
            ['business', 'fa-building-o'],
            ['politics', 'fa-university'],
            ['technology', 'fa-microchip'],
            ['entertainment', 'fa-film'],
            ['sports', 'fa-futbol-o'],
            ['science', 'fa-flask'],
            ['health', 'fa-medkit'],
            ['top stories', 'fa-newspaper-o'],
             'business',
        ];

        foreach ($cat_names as $item) {
            Category::create([
                'title' => $item[0],
                'icon_class' => $item[1],
            ]);
        }

        return Category::all();
    }
    /**
     *
     */
    static function DeletePastPosts()
    {
        $now = Carbon::now();



        $posts = Post::where('created_at', '>', $now->subHours(200))->latest()->get();
        foreach ($posts as $post) {
            $post->categories()->detach();
        }

        $posts = Post::where('created_at', '>', $now->subHour(1))->latest()->delete();


        return $posts;
    }

    static function DeletePastPostsBySource($name , $hours)
    {
        $now = Carbon::now();



        $posts = Post::whereSource($name)->where('created_at', '>', $now->subHours($hours))->latest()->get();
        foreach ($posts as $post) {
            $post->categories()->detach();
        }

        $posts = Post::whereSource($name)->where('created_at', '>', $now->subHours($hours))->latest()->delete();


        return $posts;
    }
    /**
     * @return mixed
     */
    static function deleteAllPosts()
    {
        Category::latest()->update([
            'post_ids' => []
        ]);

        return Post::latest()->delete();
    }

    /**
     *
     */
    public static function updateAll()
    {
        Post::all()->each(function ($query) {
            $query->update([
                'source' => 'bbc'
            ]);
        });
    }

    /**
     * @param $type
     * @param $category
     * @return string
     */
    public static function getArticlesFontClass($type, $obj)
    {
        if ($type == 'cat')
            $cls = $obj->icon_class;
        elseif ($type == 'search')
            $cls = 'fa-search';
        elseif ($type == 'custom-search')
            $cls = 'fa-search-plus';
        elseif ($type == 'tag')
            $cls = 'fa-tag';
        elseif ($type == 'headlines')
            $cls = 'fa-newspaper-o';
        elseif ($type == 'fav')
            $cls = 'fa-heart';
        elseif ($type == 'sources')
            $cls = 'fa-newspaper-o';
        return $cls;

    }

    /**
     * @param $type
     * @param $category
     * @param $search
     * @param $tag
     * @return string
     */
    public static function getArticlesPageTitle($type, $obj)
    {
        if ($type == 'cat')
            $title = ucfirst($obj->title);
        elseif ($type == 'search')
            $title = ucfirst($obj);
        elseif ($type == 'tag')
            $title = ucfirst($obj->title);
        elseif ($type == 'custom-search')
            $title = 'Search results';
        elseif ($type == 'fav')
            $title = ucfirst("favorites");
        elseif ($type == 'headlines')
            $title = ucfirst("headlines");
        elseif ($type == 'sources')
            $title = ucfirst("$obj->name");

        return $title;

    }

    /**
     * @param $source
     * @return bool
     */
    public static function switchSingleSources($source)
    {
        if ($source == "nbcnews"
            or $source == "cnn"
            or $source == "dailymail"
            or $source == "bbc"
            or $source == "cbsnews"
            or $source == "latimes"
            or $source == "skynews"
        )
            return true;

        return false;
    }

    /**
     * @param $route_name
     * @return string
     */
    static function activeAsideMenu($route_name)
    {
        return Route::currentRouteName() == $route_name ? 'active' : '';
    }


    /**
     *
     * @param $tags
     * @return array
     */
    static function array_optimizer($tags)
    {
        $tags = array_unique($tags);
        $key  = array_search("", $tags);
        if (false !== $key) {
            unset($tags[$key]);
        }
        $tags = array_values($tags);
        return $tags;
    }

    /**
     * @param $post
     * @return string
     */
    static function getUrlFull($post)
    {
        $source = Source::whereName($post->source)->first();
        $source->domain;
        $url = $post->url;
        if (strpos($url, "http") === false) {
            $url = $source->domain . $url;
        }

        return $url;
    }

}