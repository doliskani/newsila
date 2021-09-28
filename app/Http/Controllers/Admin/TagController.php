<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Http\Requests\TagRequest;
use App\Post;
use App\User;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $tags = Tag::all();
        return view('Admin.tags.index', compact('tags'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.tags.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
//      category icon

        Tag::create($request->all());
        alert()->success('saved successfully' , 'Congrats');
        return redirect(route('tags.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('Admin.tags.edit', compact('tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->all());
        alert()->success('Updated successfully' , 'Congrats');
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        alert()->success('Deleted successfully' , 'Congrats');
        return redirect(route('tags.index'));
    }


}
