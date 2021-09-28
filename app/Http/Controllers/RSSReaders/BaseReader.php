<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 10/19/2019
 * Time: 2:19 PM
 */

namespace App\Http\Controllers\RSSReaders;


use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use MostUse;

class BaseReader
{

    /**
     * @var
     */
    public $feeds;

    /**
     * @var
     */
    public $category;

    /**
     * @var
     */
    public $source;

    /**
     * @var
     */
    public $lang;

    /**
     * BaseReader constructor.
     * @param $feeds
     * @param $category
     */
    public function __construct($feeds, $category, $source, $lang)
    {
        $this->feeds    = $feeds;
        $this->category = Category::whereTitle($category)->first();
        $this->source   = $source;
        $this->lang     = $lang;
        ini_set("max_execution_time", 3000);
    }

    /**
     *
     */
    public function read()
    {

        //Read each feeds's items
        $entries = array();
        foreach ($this->feeds as $feed) {
            try{
                $xml     = simplexml_load_file($feed);
                $entries = array_merge($entries, $xml->xpath("//item"));
            }catch (\Exception $e){
                continue;
            }

        }



        return $this->save($entries);
    }

    /**
     * @param array $entries
     */
    public function save(array $entries)
    {
        $i = 0;
        foreach ($entries as $entry) {
            $date   = Carbon::parse(strtotime(htmlspecialchars($entry->pubDate)))->format("Y-m-d H:i");


            $title = htmlspecialchars($entry->title);
            if (strlen($title) < 20)
                continue;

            $url    = htmlspecialchars($entry->link);
            $ignore = $this->ignoreUrls($url , $title);
            if ($ignore)
                continue;


            $array = [
                'title' => $title,
                'url'   => $url,
                'date'  => $date,
            ];
            if ($post = Post::whereTitle($title)->whereUrl($url)->first()) {
                $post->update([
                    'date' => $date,
                ]);
            } else {
                $exist = $this->compareWithPrevious((object)$array);
                if (!$exist) {

                    $post = Post::create([
                        'title'  => $title,
                        'date'   => $date,
                        'source' => $this->source,
                        'url'    => $url,
                        'lang'   => $this->lang,
                    ]);
                    $post->categories()->attach($this->category->id);

                    $i++;
                }

            }

//            if ($i == 50)
//                break;
        }
        return $i;
    }


    /**
     *  get first page content
     * @param $url
     * @return bool|string
     */
    public function getContent($url, $domain, $source)
    {
        $url = str_replace('&amp;', '&', $url);
        $url = str_replace('&amp;', '&', $url);

        $url = trim($url);

        if ($source == "huffpost") {
            return file_get_contents($url);
        } else {
            $curl = curl_init();

            $host         = str_replace("https://", "", $domain);
            $lastSlashPos = strpos($host, "/");
            if ($lastSlashPos !== false) {
                $host = substr($host, 0, $lastSlashPos);
            }
            curl_setopt_array($curl, array(
                CURLOPT_URL            => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => "GET",
                CURLOPT_HTTPHEADER     => array(
                    "Accept: */*",
                    "Accept-Encoding: gzip, deflate",
                    "Cache-Control: no-cache",
                    "Connection: keep-alive",
                    "Host: $host",
                    "Postman-Token: 35d834f3-59e9-465a-84e1-67acd19769cd,82cc4785-40b1-429a-9a54-64e354226040",
                    "User-Agent: PostmanRuntime/7.16.3",
                    "cache-control: no-cache"
                ),
            ));


            $content = curl_exec($curl);
            $err     = curl_error($curl);
            curl_close($curl);

            if ($err) {
                // log to mail
                return "";
            } else {
                return $content;
            }

        }


    }

    /**
     * @param $post
     * @return bool
     */
    public function compareWithPrevious($post)
    {
        $ret         = false;
        $arr_title   = explode(" ", $post->title);
        $arr_title   = MostUse::array_optimizer($arr_title);
        $count_title = count($arr_title);

        // get latest post
        if (empty($this->category))
            return false;

        $post_ids     = $this->category->posts()->take(100)->get()->pluck('_id');
        $latest_posts = Post::latest()->whereIn('_id', $post_ids)->get();
        foreach ($latest_posts as $latest_post) {
            $pre_title = explode(" ", $latest_post->title);
            $pre_title = MostUse::array_optimizer($pre_title);
            $count_pre = count($pre_title);

            // compare with latest posts
            if ($count_pre >= $count_title) {
                $res_arr   = array_diff($arr_title, $pre_title);
                $res_arr   = MostUse::array_optimizer($res_arr);
                $count_res = count($res_arr);

                if ($count_title - 4 >= $count_res) {
                    $ret = true;
                    break;
                }


            } else {
                $res_arr   = array_diff($pre_title, $arr_title);
                $res_arr   = MostUse::array_optimizer($res_arr);
                $count_res = count($res_arr);

                if ($count_pre - 4 >= $count_res) {
                    $ret = true;
                    break;
                }

            }

        }

        return $ret;
    }

    /**
     * @param string $url
     */
    protected function ignoreUrls(string $url , string $title)
    {
        $ret = false;
        if (strpos($url, "collections") !== false) {
            $ret = true;
        }
        if (strpos($title, "Now's the time to refi. Rates") !== false) {
            $ret = true;
        }
        if (strpos($title, "Fed just") !== false) {
            $ret = true;
        }
        if (strpos($title, "Act now!") !== false) {
            $ret = true;
        }
        if (strpos($title, "Refi rates") !== false) {
            $ret = true;
        }

        return $ret;
    }


    public function getEntries(string $string)
    {
        $entries = array();
        foreach ($this->feeds as $feed) {
            $content = file_get_contents($feed);

            $pattern = '/itemtitle[\s\S]*?href="([\s\S]*?)">([\s\S]*?)<[\s\S]*?itemposttime[\s\S]*?<\/span>([\s\S]*?)</';
            preg_match_all($pattern, $content, $matches);
            return $matches;
            $left_content = $matches[1];


//            Storage::put('cnn.html' , $html);die;
        }

        return $entries;
    }

    /**
     * @param array $entries
     */
    public function test(array $entries)
    {

        echo "------------------------------------------------";
        echo "$this->source" . "<-------->" . $this->category;
        echo "------------------------------------------------\n\n";
        ?>
        <ul><?php
            //Print all the entries
            foreach ($entries as $entry) {
                if (isset($entry->link)) {

                    ?>
                    <li><a href="<?= $entry->link ?>"><?= $entry->title ?></a>
                        <p><?= strftime('%m-%d-%Y %I:%M %p', strtotime($entry->pubDate)) ?></p>
                    </li>
                    <?php
                } else {
                    echo $this->source;
                    die;
                }

            }
            ?>
        </ul>
        <?php
        return 10;
    }


}