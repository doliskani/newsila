<?php

namespace App\Http\Controllers\RSSReaders;

use App\Category;
use App\Helpers\MostUse;
use App\Post;
use App\Source;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RSSController extends Controller
{

    /**
     * @return mixed
     */
    public function saveRSS()
    {
        return 10;
//        return Source::latest()->get();

    //  return  Source::latest()->delete();
       $this->saveCategoriesFeeds("top stories" , ["http://www.nbcnewyork.com/news/top-stories/?rss=y&embedThumb=y&summary=y"] , "nbcnews" , "en");
       $this->saveCategoriesFeeds("politics" , ["http://www.nbcnewyork.com/news/politics/?rss=y&embedThumb=y&summary=y"] , "nbcnews" , "en");
       $this->saveCategoriesFeeds("sports" , ["http://www.nbcnewyork.com/news/sports/?rss=y&embedThumb=y&summary=y"] , "nbcnews" , "en");
       $this->saveCategoriesFeeds("technology" , ["http://www.nbcnewyork.com/news/tech/?rss=y&embedThumb=y&summary=y"] , "nbcnews" , "en");
       $this->saveCategoriesFeeds("entertainment" , ["https://www.nbcnewyork.com/entertainment/entertainment-news/?rss=y&embedThumb=y&summary=y"] , "nbcnews" , "en");

       $this->saveCategoriesFeeds("top stories" , ["http://feeds.bbci.co.uk/news/rss.xml"] , "bbc" , "en");
       $this->saveCategoriesFeeds("business" , ["http://feeds.bbci.co.uk/news/business/rss.xml"] , "bbc" , "en");
       $this->saveCategoriesFeeds("politics" , ["http://feeds.bbci.co.uk/news/politics/rss.xml"] , "bbc" , "en");
       $this->saveCategoriesFeeds("health" , ["http://feeds.bbci.co.uk/news/health/rss.xml"] , "bbc" , "en");
       $this->saveCategoriesFeeds("science" , ["http://feeds.bbci.co.uk/news/science_and_environment/rss.xml"] , "bbc" , "en");
       $this->saveCategoriesFeeds("world" , ["http://feeds.bbci.co.uk/news/world/rss.xml"] , "bbc" , "en");
       $this->saveCategoriesFeeds("technology" , ["http://feeds.bbci.co.uk/news/technology/rss.xml"] , "bbc" , "en");
       $this->saveCategoriesFeeds("entertainment" , ["http://feeds.bbci.co.uk/news/entertainment_and_arts/rss.xml"] , "bbc" , "en");


       $this->saveCategoriesFeeds("world", [
           "https://rss.nytimes.com/services/xml/rss/nyt/World.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/Africa.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/AsiaPacific.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/Americas.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/Europe.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/MiddleEast.xml",
       ], "nytimes", "en");

       $this->saveCategoriesFeeds("politics", [
           "https://rss.nytimes.com/services/xml/rss/nyt/Politics.xml",
       ], "nytimes", "en");

       $this->saveCategoriesFeeds("business", [
           "https://rss.nytimes.com/services/xml/rss/nyt/Business.xml",
       ], "nytimes", "en");

       $this->saveCategoriesFeeds("technology", [
           "https://rss.nytimes.com/services/xml/rss/nyt/Technology.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/PersonalTech.xml",
       ], "nytimes", "en");

       $this->saveCategoriesFeeds("technology", [
           "https://rss.nytimes.com/services/xml/rss/nyt/Sports.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/CollegeFootball.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/ProBasketball.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/Baseball.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/Golf.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/ProFootball.xml",
       ], "nytimes", "en");

       $this->saveCategoriesFeeds("science", [
           "https://rss.nytimes.com/services/xml/rss/nyt/Science.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/Climate.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/Space.xml",
       ], "nytimes", "en");

       $this->saveCategoriesFeeds("health", [
           "https://www.nytimes.com/services/xml/rss/nyt/Health.xml",
       ], "nytimes", "en");

       $this->saveCategoriesFeeds("entertainment", [
           "https://rss.nytimes.com/services/xml/rss/nyt/Dance.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/Television.xml",
           "https://rss.nytimes.com/services/xml/rss/nyt/Movies.xml",
           "https://www.nytimes.com/services/xml/rss/nyt/Travel.xml",
       ], "nytimes", "en");




       $this->saveCategoriesFeeds("top stories", [
           "http://rss.cnn.com/rss/edition.rss",
       ], "cnn", "en");

       $this->saveCategoriesFeeds("world", [
           "http://rss.cnn.com/rss/edition_world.rss",
       ], "cnn", "en");

       $this->saveCategoriesFeeds("business", [
           "http://rss.cnn.com/rss/money_news_international.rss",
       ], "cnn", "en");

       $this->saveCategoriesFeeds("technology", [
           "http://rss.cnn.com/rss/edition_technology.rss",
       ], "cnn", "en");

       $this->saveCategoriesFeeds("science", [
           "http://rss.cnn.com/rss/edition_space.rss",
       ], "cnn", "en");


       $this->saveCategoriesFeeds("entertainment", [
           "http://rss.cnn.com/rss/edition_entertainment.rss",
           "http://rss.cnn.com/rss/edition_travel.rss",
       ], "cnn", "en");


       $this->saveCategoriesFeeds("sport", [
           "http://rss.cnn.com/rss/edition_sport.rss",
           "http://rss.cnn.com/rss/edition_football.rss",
           "http://rss.cnn.com/rss/edition_golf.rss",
       ], "cnn", "en");
//








       $this->saveCategoriesFeeds("business", [
           "https://www.washingtontimes.com/rss/headlines/news/business-economy/",
       ], "washingtontimes", "en");

       $this->saveCategoriesFeeds("world", [
           "https://www.washingtontimes.com/rss/headlines/news/world/",
       ], "washingtontimes", "en");

       $this->saveCategoriesFeeds("politics", [
           "https://www.washingtontimes.com/rss/headlines/news/politics/",
       ], "washingtontimes", "en");

       $this->saveCategoriesFeeds("sports", [
           "https://www.washingtontimes.com/rss/headlines/sports/baseball",
           "https://www.washingtontimes.com/rss/headlines/sports/basketball/",
           "https://www.washingtontimes.com/rss/headlines/sports/football/",
           "https://www.washingtontimes.com/rss/headlines/sports/golf/",
       ], "washingtontimes", "en");



       $this->saveCategoriesFeeds("politics", [
           "https://www.theguardian.com/politics/rss",
       ], "theguardian", "en");

       $this->saveCategoriesFeeds("business", [
           "https://www.theguardian.com/uk/business/rss",
       ], "theguardian", "en");

       $this->saveCategoriesFeeds("technology", [
           "https://www.theguardian.com/uk/technology/rss",
       ], "theguardian", "en");
//

       $this->saveCategoriesFeeds("science", [
           "https://www.theguardian.com/science/rss",
       ], "theguardian", "en");
//

       $this->saveCategoriesFeeds("world", [
           "https://www.theguardian.com/world/rss",
       ], "theguardian", "en");//




       $this->saveCategoriesFeeds("top stories", [
           "http://rssfeeds.usatoday.com/usatoday-NewsTopStories",
       ], "usatoday", "en");

       $this->saveCategoriesFeeds("world", [
           "http://rssfeeds.usatoday.com/UsatodaycomWorld-TopStories",
       ], "usatoday", "en");

       $this->saveCategoriesFeeds("sports", [
           "http://rssfeeds.usatoday.com/UsatodaycomSports-TopStories",
       ], "usatoday", "en");

       $this->saveCategoriesFeeds("entertainment", [
           "http://rssfeeds.usatoday.com/usatoday-LifeTopStories",
           "http://rssfeeds.usatoday.com/UsatodaycomTravel-TopStories",
       ], "usatoday", "en");

       $this->saveCategoriesFeeds("business", [
           "http://rssfeeds.usatoday.com/UsatodaycomMoney-TopStories",
       ], "usatoday", "en");

       $this->saveCategoriesFeeds("technology", [
           "http://rssfeeds.usatoday.com/usatoday-TechTopStories",
       ], "usatoday", "en");





       $this->saveCategoriesFeeds("technology", [
           "https://www.latimes.com/business/technology/rss2.0.xml",
       ], "latimes", "en");

       $this->saveCategoriesFeeds("business", [
           "https://www.latimes.com/business/rss2.0.xml#nt=1col-7030col1",
       ], "latimes", "en");


       $this->saveCategoriesFeeds("politics", [
           "https://www.latimes.com/politics/rss2.0.xml",
       ], "latimes", "en");

       $this->saveCategoriesFeeds("science", [
           "https://www.latimes.com/science/rss2.0.xml",
           "https://www.latimes.com/environment/rss2.0.xml",
       ], "latimes", "en");

       $this->saveCategoriesFeeds("world", [
           "https://www.latimes.com/world-nation/rss2.0.xml",
       ], "latimes", "en");

       $this->saveCategoriesFeeds("entertainment", [
           "https://www.latimes.com/travel/rss2.0.xml",
       ], "latimes", "en");


       $this->saveCategoriesFeeds("top stories", [
           "https://www.cbsnews.com/latest/rss/main",
       ], "cbsnews", "en");

       $this->saveCategoriesFeeds("politics", [
           "https://www.cbsnews.com/latest/rss/politics",
       ], "cbsnews", "en");

       $this->saveCategoriesFeeds("world", [
           "https://www.cbsnews.com/latest/rss/world",
       ], "cbsnews", "en");

       $this->saveCategoriesFeeds("science", [
           "https://www.cbsnews.com/latest/rss/science",
       ], "cbsnews", "en");

       $this->saveCategoriesFeeds("technology", [
           "https://www.cbsnews.com/latest/rss/technology",
       ], "cbsnews", "en");


       $this->saveCategoriesFeeds("health", [
           "https://www.cbsnews.com/latest/rss/health",
       ], "cbsnews", "en");


       $this->saveCategoriesFeeds("entertainment", [
           "https://www.cbsnews.com/latest/rss/entertainment",
       ], "cbsnews", "en");



       $this->saveCategoriesFeeds("business", [
           "https://www.cbsnews.com/latest/rss/moneywatch",
       ], "cbsnews", "en");




       $this->saveCategoriesFeeds("top stories", [
           "https://www.dailymail.co.uk/articles.rss",
       ], "dailymail", "en");

       $this->saveCategoriesFeeds("sports", [
           "https://www.dailymail.co.uk/sport/index.rss",
       ], "dailymail", "en");


       $this->saveCategoriesFeeds("world", [
           "https://www.dailymail.co.uk/news/worldnews/index.rss",
       ], "dailymail", "en");
//
//
       $this->saveCategoriesFeeds("politics", [
           "https://www.dailymail.co.uk/news/us-politics/index.rss",
       ], "dailymail", "en");


       $this->saveCategoriesFeeds("health", [
           "https://www.dailymail.co.uk/health/index.rss",
       ], "dailymail", "en");


       $this->saveCategoriesFeeds("science", [
           "https://www.dailymail.co.uk/sciencetech/index.rss",
       ], "dailymail", "en");


       $this->saveCategoriesFeeds("business", [
           "https://www.dailymail.co.uk/money/index.rss",
       ], "dailymail", "en");


       $this->saveCategoriesFeeds("entertainment", [
           "https://www.dailymail.co.uk/travel/index.rss",
       ], "dailymail", "en");


       $this->saveCategoriesFeeds("world", [
           "https://feeds.a.dj.com/rss/RSSWorldNews.xml",
       ], "wsj", "en");

       $this->saveCategoriesFeeds("business", [
           "https://feeds.a.dj.com/rss/WSJcomUSBusiness.xml",
       ], "wsj", "en");

       $this->saveCategoriesFeeds("technology", [
           "https://feeds.a.dj.com/rss/RSSWSJD.xml",
       ], "wsj", "en");


       $this->saveCategoriesFeeds("business", [
           "https://finance.yahoo.com/rss/topstories",
       ], "yahoo", "en");


       $this->saveCategoriesFeeds("top stories", [
           "https://news.yahoo.com/rss/mostviewed",
       ], "yahoo", "en");



       $this->saveCategoriesFeeds("sports", [
           "https://sports.yahoo.com/mlb/teams/bos/rss/?shangrila=1",
       ], "yahoo", "en");




       $this->saveCategoriesFeeds("sports", [
           "https://www.independent.co.uk/sport/general/athletics/rss",
           "https://www.independent.co.uk/sport/football/rss",
           "https://www.independent.co.uk/sport/golf/rss",
       ], "independent", "en");


       $this->saveCategoriesFeeds("business", [
           "https://www.independent.co.uk/money/spend-save/rss",
           "https://www.independent.co.uk/money/loans-credit/rss",
           "https://www.independent.co.uk/money/mortgages/rss",
       ], "independent", "en");



       $this->saveCategoriesFeeds("entertainment", [
           "https://www.independent.co.uk/travel/48-hours-in/rss",
           "https://www.independent.co.uk/travel/news-and-advice/rss",
       ], "independent", "en");


       $this->saveCategoriesFeeds("science", [
           "https://www.independent.co.uk/news/science/rss",
       ], "independent", "en");


       $this->saveCategoriesFeeds("world", [
           "https://www.independent.co.uk/news/world/rss",
       ], "independent", "en");




       $this->saveCategoriesFeeds("world", [
           "http://feeds.skynews.com/feeds/rss/world.xml",
       ], "skynews", "en");


       $this->saveCategoriesFeeds("business", [
           "http://feeds.skynews.com/feeds/rss/business.xml",
       ], "skynews", "en");


       $this->saveCategoriesFeeds("politics", [
           "http://feeds.skynews.com/feeds/rss/politics.xml",
       ], "skynews", "en");


       $this->saveCategoriesFeeds("technology", [
           "http://feeds.skynews.com/feeds/rss/technology.xml",
       ], "skynews", "en");


       $this->saveCategoriesFeeds("entertainment", [
           "http://feeds.skynews.com/feeds/rss/entertainment.xml",
       ], "skynews", "en");




       $this->saveCategoriesFeeds("top stories", [
           "http://feeds.foxnews.com/foxnews/latest",
       ], "foxnews", "en");


       $this->saveCategoriesFeeds("world", [
           "http://feeds.foxnews.com/foxnews/world",
       ], "foxnews", "en");


       $this->saveCategoriesFeeds("politics", [
           "http://feeds.foxnews.com/foxnews/politics",
       ], "foxnews", "en");


       $this->saveCategoriesFeeds("health", [
           "http://feeds.foxnews.com/foxnews/health",
       ], "foxnews", "en");


       $this->saveCategoriesFeeds("entertainment", [
           "http://feeds.foxnews.com/foxnews/entertainment",
       ], "foxnews", "en");


       $this->saveCategoriesFeeds("technology", [
           "http://feeds.foxnews.com/foxnews/scitech",
       ], "foxnews", "en");








       $this->saveCategoriesFeeds("politics", [
           "https://www.huffpost.com/section/politics/feed",
       ], "huffpost", "en");



       $this->saveCategoriesFeeds("business", [
           "https://www.huffpost.com/section/business/feed",
       ], "huffpost", "en");


       $this->saveCategoriesFeeds("entertainment", [
           "https://www.huffpost.com/section/entertainment/feed",
       ], "huffpost", "en");


       $this->saveCategoriesFeeds("health", [
           "https://www.huffpost.com/section/health/feed",
       ], "huffpost", "en");


       $this->saveCategoriesFeeds("science", [
           "https://www.huffpost.com/section/science/feed",
       ], "huffpost", "en");


       $this->saveCategoriesFeeds("sports", [
           "https://www.huffpost.com/section/sports/feed",
       ], "huffpost", "en");


        return Source::latest()->get();
    }

    /**
     * @param $category
     * @param $feed
     * @param $name
     * @param $lang
     */
    public function saveCategoriesFeeds($category, $feed, $name, $lang)
    {
        Source::create([
            'name'     => $name,
            'feed'     => $feed,
            'category' => $category,
            'lang'     => $lang,
        ]);

    }

    /**
     * every five minutes this method called with schedule task
     * every time news from one source get and save
     */
    public function SavePostFromRSS()
    {

//       return MostUse::deleteAllPosts();
//        return Post::latest()->get();

//       return Source::find("5dab5a5717dd3337fc0037f6")->update([
//            'feed' => [
//                "https://www.washingtontimes.com/rss/headlines/sports/basketball/",
//                "https://www.washingtontimes.com/rss/headlines/sports/football/",
//                "https://www.washingtontimes.com/rss/headlines/sports/golf/",
//            ]
//        ]);

//        return Post::whereSource($rss->name)->orderByDesc('date')->take(50)->get();

        $done = false;
        $rss  = Source::whereRead(0)->first();


        if (!$rss) {
            Source::latest()->update([
                'read' => 0
            ]);
            $rss = Source::whereRead(0)->first();
        }
        $arr     = array();
        $sources = Source::whereName($rss->name)->get();
        foreach ($sources as $source) {
            $baseReader = new BaseReader($source->feed, $source->category, $source->name, $source->lang);
            $ret        = $baseReader->read();
            if ($ret > 0)
                $done = true;
        }

        Source::whereName($rss->name)->update([
            'read' => 1
        ]);

        return Post::whereSource($rss->name)->orderByDesc('date')->take(50)->get();

    }


    /**
     *  get first page content
     * @param $url
     * @return bool|string
     */
    public function getContent($post)
    {
        $url = $post->url;
        $url = str_replace('&amp;', '&', $url);
        $url = str_replace('&amp;', '&', $url);
//        $url = str_replace('http://', 'https://', $url);

        $url = trim($url);

        if ($this->switchSources($post)) {
            {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "Accept: */*",
                        "Accept-Encoding: gzip, deflate",
                        "Cache-Control: no-cache",
                        "Connection: keep-alive",
                        "Postman-Token: 01a54186-0e20-4614-a9ef-ac884e493839,f700de86-4f75-4284-a9e5-7d2fc27c7671",
                        "User-Agent: PostmanRuntime/7.18.0",
                        "cache-control: no-cache"
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    return "cURL Error #:" . $err;
                } else {
                    return $response;
                }
            }
        } else {
            return file_get_contents($url);
        }

    }

    public function switchSources($post)
    {
        $ret = false;
        if ($post->source == "cnn" || $post->source == "usatoday") {
            if (strpos($post->url, "rss") !== false)
                $ret = true;
        }
        return $ret;
    }

}
