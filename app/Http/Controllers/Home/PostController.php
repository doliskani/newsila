<?php

namespace App\Http\Controllers\Home;

use App\Advertisement;
use App\Category;
use App\Helpers\MostUse;
use App\Http\Controllers\Crawlers\CrawlerBase;
use App\Http\Controllers\RSSReaders\BaseReader;
use App\Http\Controllers\RSSReaders\RSSController;
use App\Like;
use App\Post;
use App\Source;
use App\Tag;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PostController extends Controller
{
    use seo;

    protected $perSection = 20;

    protected $chunk = 5;


    /**
     * @param Post $post
     */
    public function showNews($lang , Post $post)
    {


        $this->getSEOPageType($post);
        if ($post->source == "cnn" || $post->source == "theguardian")
            return view('Home.single.link', compact('post'));

        $RSSController = new RSSController();
        $content = $RSSController->getContent($post);
        return view('Home.single.index', compact('post', 'content'));

    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategoryPage($lang , Category $category)
    {

        $ownAdvert = $category->advertisement;
        $this->getSEOPageType($category);
        $obj     = $category;
        $arr     = $this->getTagsAndAdverts();
        $tags    = $arr[0];
        $adverts = $arr[1];
        $type    = "cat";
        return view('Home.articles.index', compact('obj', 'adverts', 'tags', 'type', 'ownAdvert'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCategoryNews(Request $request, $lang , Category $category)
    {
        $lang = app()->getLocale();
        return $category->with('advertisement')->find($category->id)->posts()->RemovePostHasSpecialChars()->whereLang($lang)->orderByDesc('date')->paginate($this->perSection);

    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTagPage($lang , Tag $tag)
    {

        $ownAdvert = Advertisement::whereCategoryId("other")->first();
        $this->getSEOPageType($tag);
        $obj     = $tag;
        $arr     = $this->getTagsAndAdverts();
        $tags    = $arr[0];
        $adverts = $arr[1];
        $type    = "tag";
        return view('Home.articles.index', compact('obj', 'adverts', 'tags', 'type', 'ownAdvert'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getTagNews(Request $request, $lang ,  Tag $tag)
    {

        $lang = app()->getLocale();
        $title = strtolower($tag->title);
        return $articles = Post::whereLang($lang)->RemovePostHasSpecialChars()->where('title', 'like', "%$title%")->orderByDesc('date')->paginate($this->perSection);

    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFavPage()
    {
        $ownAdvert = Advertisement::whereCategoryId("other")->first();
        $this->getSEOPageType("fav");
        $obj     = "fav";
        $arr     = $this->getTagsAndAdverts();
        $tags    = $arr[0];
        $adverts = $arr[1];
        $type    = "fav";
        return view('Home.articles.index', compact('obj', 'adverts', 'tags', 'type', 'ownAdvert'));
    }


    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getFavNews(Request $request)
    {
        $lang = app()->getLocale();
        return $articles = Post::whereLang($lang)->RemovePostHasSpecialChars()->orderByDesc('count_likes')->orderByDesc('date')->paginate($this->perSection);

    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showHeadPage()
    {
        $ownAdvert = Advertisement::whereCategoryId("other")->first();
        $this->getSEOPageType("headlines");
        $obj     = "headlines";
        $arr     = $this->getTagsAndAdverts();
        $tags    = $arr[0];
        $adverts = $arr[1];
        $type    = "headlines";
        return view('Home.articles.index', compact('obj', 'adverts', 'tags', 'type', 'ownAdvert'));

    }


    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getHeadNews(Request $request)
    {
        $lang    = app()->getLocale();
        $top_cat = Category::where('title', "top stories")->first();
        return $articles = $top_cat->posts()->RemovePostHasSpecialChars()->whereLang($lang)->orderByDesc('date')->paginate($this->perSection);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSourcePage($lang , Source $source)
    {

        $ownAdvert = Advertisement::whereCategoryId("other")->first();
        $this->getSEOPageType($source->name . " news");
        $obj     = $source;
        $arr     = $this->getTagsAndAdverts();
        $tags    = $arr[0];
        $adverts = $arr[1];
        $type    = "sources";
        return view('Home.articles.index', compact('obj', 'adverts', 'tags', 'type', 'ownAdvert'));

    }


    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function SourcePaginate(Request $request ,$lang ,  Source $source)
    {
        $lang    = app()->getLocale();
        return $articles = Post::whereLang($lang)->RemovePostHasSpecialChars()->where('title' , 'not regexp' , '/href/')->where('source', "$source->name")->orderByDesc('date')->paginate($this->perSection);



    }
}
