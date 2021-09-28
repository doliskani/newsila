<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 10/16/2019
 * Time: 11:43 AM
 */

namespace App\Http\Controllers\Home;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Support\Str;

trait seo
{

    /**
     *
     */
    private function getSEOPageType($obj)
    {
        if ($obj instanceof Post) {
            $title       = $obj->title;
            $keyword     = explode(" ", $title);
            $description = $obj->description;
            $date        = Carbon::parse($obj->updated_at);
            $category    = $obj->categories()->first()->title;
            $image       = $obj->image;
            $type        = "Article";
        } else if ($obj instanceof Category) {
            $title       = $obj->title_seo;
            $keyword     = $obj->keyword_seo;
            $description = $obj->description_seo;
            $date        = now();
            $category    = $obj->title;
            $image       = "";
            $type        = "Articles";
        } else if ($obj instanceof Tag) {
            $title       = $obj->title_seo;
            $keyword     = $obj->keyword_seo;
            $description = $obj->description_seo;
            $date        = now();
            $category    = $obj->title;
            $image       = "";
            $type        = "Articles";
        } else if ($obj instanceof Setting) {
            $title       = $obj->index_title_seo;
            $keyword     = $obj->index_keyword_seo;
            $description = $obj->index_description_seo;
            $date        = now();
            $category    = $obj->index_title_seo;
            $image       = "";
            $type        = "Articles";
        } else {
            $keyword     = [];
            $title       = "$obj";
            $description = "Read full articles, watch videos, browse thousands of titles and more on the 'world' topic with Google News.";
            $date        = now();
            $category    = "categories";
            $image       = "";
            $type        = "Articles";
        }
        $description = Str::words($description, 30, '...');
        $url         = url()->current();
        $arr         = (object)[
            'title'       => $title,
            'keyword'     => $keyword,
            'description' => $description,
            'date'        => $date,
            'category'    => $category,
            'image'       => $image,
            'type'        => $type,
            'url'         => $url,
        ];
        $this->setSEO($arr);


    }

    public function setSEO($arr)
    {
        SEOMeta::setTitle($arr->title);
        SEOMeta::setDescription($arr->description);
        SEOMeta::addKeyword($arr->keyword);
        SEOMeta::addMeta('article:published_time', $arr->date->toW3CString(), 'property');

//        SEOMeta::addMeta('article:section', $post->category, 'property');

        OpenGraph::setDescription($arr->description);
        OpenGraph::setTitle($arr->title);
        OpenGraph::setUrl($arr->url);
        OpenGraph::addProperty('type', $arr->type);


        JsonLd::setTitle($arr->title);
        JsonLd::setDescription($arr->description);
        JsonLd::setType($arr->type);
    }

}