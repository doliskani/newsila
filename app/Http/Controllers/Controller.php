<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Post;
use App\Tag;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return array
     */
    public function getTagsAndAdverts()
    {
        $tags = Tag::latest()->select('title' , 'slug')->take(10)->get();


        $adverts = [
            'right'  => Advertisement::wherePublish('on')->select('url', 'image', 'position', 'ad_number')->wherePosition('right')->orderBy('ad_number', 'asc')->get(),
            'center' => Advertisement::wherePublish('on')->select('url', 'image', 'position', 'ad_number')->wherePosition('center')->orderBy('ad_number', 'asc')->get(),
        ];
        return [$tags, $adverts];
    }


}
