<?php

namespace App\Http\Controllers\Home;

use App\Advertisement;
use App\Category;
use App\Helpers\MostUse;
use App\Http\Controllers\RSSReaders\BaseReader;
use App\Language;
use App\Like;
use App\Post;
use App\SavedAddress;
use App\Setting;
use App\Source;
use App\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{

    use seo;

    protected $perSection = 10;

    protected $chunk = 5;


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

       
        // return Category::all();


//        return Source::latest()->delete();
        $setting = Setting::first();

        $this->getSEOPageType($setting);

        $top_cat      = Category::where('title', "top stories")->first();
        $lang         = app()->getLocale();
        $latest_posts = $top_cat->posts()->whereLang($lang)->orderByDesc('date')->take($this->perSection)->get();
        $latest_ids   = $latest_posts->pluck('_id')->toArray();

        $cat_names = [
            'world', 'business',
            'politics', 'technology',
            'entertainment', 'sports',
            'science', 'health'
        ];
        $catsPosts = [];
        foreach ($cat_names as $cat_name) {
            $category               = Category::where('title', $cat_name)->first();
            $catsPosts[$cat_name][] = $category;
            $catsPosts[$cat_name][] = $category->posts()->RemovePostHasSpecialChars()->whereLang($lang)->whereNotIn('_id', $latest_ids)->orderByDesc('date')->take($this->perSection)->get();
        }

//        $cat_names = ['world', 'business' , 'politics', 'technology' , 'entertainment', 'sports' , 'science', 'health'];

//        return Post::where('tags' , 'like' , "%women%")->first();
        $arr     = $this->getTagsAndAdverts();
        $tags    = $arr[0];
        $adverts = $arr[1];


//        JsonLd::addImage($post->images->list('url'));


        return view('Home.root.index', compact('adverts', 'catsPosts', 'latest_posts', 'latest_ids', 'tags'));
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function scrollInHome(Request $request)
    {
        $lang          = app()->getLocale();
        $articlesCount = $request->articlesCount;
        $latest_ids    = $request->latestids;
        $cat_names     = [];
        if ($articlesCount == 3) {
            $cat_names = ['politics', 'technology'];
        } elseif ($articlesCount == 5) {
            $cat_names = ['entertainment', 'sports'];
        } elseif ($articlesCount == 7) {
            $cat_names = ['science', 'health'];
        }


        $catsPosts = [];
        $i         = 0;
        foreach ($cat_names as $cat_name) {
            $category        = Category::where('title', $cat_name)->first();
            $catsPosts[$i][] = $category;
            $catsPosts[$i][] = $category->posts()->RemovePostHasSpecialChars()->orderByDesc('date')->whereLang($lang)->whereNotIn('_id', $latest_ids)->take($this->perSection)->get();
            $i++;
        }
        return $catsPosts;
    }

    /**
     * @param Post $post
     * @param $like
     * @return Post
     */
    public function like(Post $post, $like)
    {


        if ($post) {
            $ip         = \request()->ip();
            $like_exist = $post->likes()->whereIp($ip)->first();
            if ($like_exist) {
                $like_exist->like = $like;
                $like_exist->save();
            } else {
                $post->likes()->create([
                    'ip'   => $ip,
                    'like' => $like,
                ]);
            }

            $post->update([
                'count_likes'    => $post->likes()->whereLike('1')->count(),
                'count_dislikes' => $post->likes()->whereLike('0')->count(),
            ]);
        }
        return $post;


    }


    /**
     * @param $search
     * @return mixed
     */
    public function search($lang, $search)
    {
        $lang = app()->getLocale();
        return Post::RemovePostHasSpecialChars()->where('title', 'like', "%$search%")->orderByDesc('date')->take(7)->get();

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSearchPage(Request $request)
    {

        $ownAdvert = Advertisement::whereCategoryId("other")->first();
        $this->getSEOPageType("search");
        $obj     = $search = $request->search;
        $arr     = $this->getTagsAndAdverts();
        $tags    = $arr[0];
        $adverts = $arr[1];
        $type    = "search";
        return view('Home.articles.index', compact('obj', 'adverts', 'tags', 'type', 'ownAdvert'));
    }


    /**
     * @param Request $request
     * @param $search
     * @return mixed
     */
    public function searchPaginate(Request $request, $lang, $search)
    {
        return Post::RemovePostHasSpecialChars()->where('title', 'like', "%$search%")->orderByDesc('date')->paginate($this->perSection + $this->perSection);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCustomSearchPage(Request $request, $lang)
    {
        $ownAdvert = Advertisement::whereCategoryId("other")->first();
        $this->getSEOPageType("custom-search");
        $phrase        = $request->phrase;// search in title and description
        $has_words     = $request->has_words;// search in title and description
        $exclude_words = $request->exclude_words;// exclude search in title or description
        $website       = strtolower($request->website);
        $date          = $request->date;
        $obj           = (object)[
            'phrase'        => $phrase,
            'has_words'     => $has_words,
            'exclude_words' => $exclude_words,
            'website'       => $website,
            'date'          => $date,
        ];

//        return $raw;

        $arr     = $this->getTagsAndAdverts();
        $tags    = $arr[0];
        $adverts = $arr[1];
        $type    = "custom-search";
        return view('Home.articles.index', compact('obj', 'adverts', 'tags', 'type', 'ownAdvert'));

    }

    /**
     * @param Request $request
     * @return mixed
     *
     */
    public function CustomSearchPaginate(Request $request, $lang)
    {
        $obj = (object)$request->obj;
        return $articles = Post::RemovePostHasSpecialChars()->search($obj)->orderByDesc('date')->paginate($this->perSection + $this->perSection);

    }

    public function test()
    {
//        return Source::find('5dab5a5717dd3337fc0037e8');

//        return Post::whereSource("cnn")->where('title' , 'like' , "%Refi rates%")->orderByDesc('date')->delete();

        return Post::where('title' , 'like' , "%Elite unit works to%")->orderByDesc('date')->delete();
//        return Category::find('5dab0c0517dd3337fc0036e2');
//        return file_get_contents('http://rss.cnn.com/~r/rss/edition_travel/~3/1BOuWpBmqSY/index.html');
//        return Post::whereSource('foxnews')->orderByDesc('date')->delete();

//       return MostUse::DeletePastPostsBySource('foxnews' , 200);
        return $sources = Source::whereName("foxnews")->get();
        foreach ($sources as $source) {
//            if ($source->category == "entertainment") {
            $baseReader = new BaseReader($source->feed, $source->category, $source->name, $source->lang);
            $baseReader->read();
//            }
        }
        return Post::whereSource('foxnews')->orderByDesc('date')->get();


//        return Post::latest()->get();
    }

}
