<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\AllowNews;
use App\Category;
use App\CategoryPost;
use App\Helpers\FreqFunc;
use App\Helpers\imageGoj;
use App\Http\Requests\CategoryRequest;
use App\ImageSize;
use App\Newspaper;
use App\Permission;
use App\Post;
use App\Setting;
use App\Site;
use App\Source;
use App\User;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $sources = Source::groupBy('name')->orderBy('name')->get()->pluck('name');
        $sources_posts = [];
        foreach ($sources->toArray() as $source) {
            $sources_posts[$source] = Post::with('categories')->whereSource($source)->orderBy('date' , 'desc')->paginate(5);
        }



//        return Post::all()->each(function ($post){
//            $date = explode('-' , $post->date);
//            $yearHours = explode(" " , $date[2] );
//            $date = $yearHours[0] . "-" . $date[1] . "-" . $date[0] . " " . $yearHours[1] . ":00";
//            $post->update([
//               'date' => $date
//            ]);
//        });


        return view('Admin.posts.index' , compact('sources' , 'sources_posts'));
    }

    public function getAllPosts()
    {
        $sources = Source::groupBy('name')->orderBy('name')->get()->pluck('name')->toArray();
        $sources_posts = [];
        foreach ($sources as $source) {
            $sources_posts[$source] = Post::with('categories')->whereSource($source)->orderBy('date' , 'desc')->paginate(5);
        }

        return [$sources , $sources_posts];
    }

    public function pagination(Request $request)
    {
        return Post::with('categories')->whereSource($request->source)->orderBy('date' , 'desc')->paginate(5);
    }

    public function search(Request $request)
    {
        return Post::where('title' , 'like' , "%$request->value%")->orderBy('date' , 'desc')->take(5)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
//      category icon



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

    }


}
