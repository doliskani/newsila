<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Post;
use App\User;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $categories = Category::all();
        return view('Admin.categories.index', compact('categories'));

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

        Category::create($request->all());
        alert()->success('saved successfully' , 'Congrats');
        return redirect(route('categories.index'));

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
    public function edit(Category $category)
    {
        return view('Admin.categories.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        alert()->success('Updated successfully' , 'Congrats');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->posts()->delete();
        $category->delete();
        alert()->success('Deleted successfully' , 'Congrats');
        return redirect(route('categories.index'));
    }


}
