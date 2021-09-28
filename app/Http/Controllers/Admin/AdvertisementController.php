<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Advertisement;
use App\AllowNews;
use App\Category;
use App\CategoryPost;
use App\Helpers\FreqFunc;
use App\Helpers\imageGoj;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\CategoryRequest;
use App\ImageSize;
use App\Newspaper;
use App\Permission;
use App\Post;
use App\Setting;
use App\Site;
use App\User;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


//       return $advertisements = Advertisement::latest()->paginate(10);
        return view('Admin.advertisements.index');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAdverts()
    {


        return Advertisement::latest()->with('category')->paginate(10);

    }
    /**
     * advertisement show or not
     *
     * @return \Illuminate\Http\Response
     */
    public function publish(Advertisement $advertisement)
    {
//        return $advertisement;
        $publish = "off";
        if ($advertisement->publish == "off"){
            $publish = "on";
        }
        $advertisement->update([
           'publish' => $publish
        ]);
        return $advertisement;


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.advertisements.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementRequest $request)
    {
//      category icon

        Advertisement::create(array_merge($request->all() , ['publish' => (isset($request->publish) ? "on" : "off")]));
        alert()->success('saved successfully' , 'Congrats');
        return redirect(route('advertisements.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        return view('Admin.advertisements.edit', compact('advertisement'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisementRequest $request, Advertisement $advertisement)
    {
        $advertisement->update(array_merge($request->all() , ['publish' => (isset($request->publish) ? "on" : "off")]));
        alert()->success('Updated successfully' , 'Congrats');
        return redirect(route('advertisements.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( Advertisement $advertisement)
    {
        $advertisement->delete();
        alert()->success('Deleted successfully' , 'Congrats');
        return redirect(route('advertisements.index'));
    }


}
