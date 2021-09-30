<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);



// VirtualHost *:80>
//     ServerName newsich.com
//     ServerAlias www.newsich.com
//     DocumentRoot /home/admin/domains/newsich.com/public_html/newsich_app/public
//     ErrorLog /home/admin/domains/newsich.com/log/error.log
//     CustomLog /home/admin/domains/newsich.com/log/requests.log combined
// </VirtualHost>

// sudo ln -s /etc/httpd/sites-available/newsich.com.conf /etc/httpd/sites-enabled/newsich.com.conf


// db.createUser(
//     {
//             user: "newsich_user",
    
//             pwd: "tT1Y^$$*YH@G",
    
//             roles:[
//                 {role: "readWrite" , db:"newsich"}
//             ]
//     })


    // db.createUser(
    //     {
    //             user: "cbunews_user",
        
    //             pwd: "perfect@123",
        
    //             roles:[
    //                 {role: "readWrite" , db:"cbunews"}
    //             ]
    //     })


// docker exec -i 11c9af588773 sh -c 'mongorestore --authenticationDatabase admin -u root -p 123456 --db cbunews --archive' < ./data/cbunews
// db.createUser(
//     {
//       user: "root7",
//       pwd: "@123%$#YHG@#",
//       roles: [ { role: "userAdminAnyDatabase", db: "admin" } ]
//     }
//   )


// UPDATE wp_options SET option_value = replace(option_value, 'https://karadstudio.com', 'https://eraartstudio.ir') WHERE option_name = 'home' OR option_name = 'siteurl';
// UPDATE wp_posts SET guid = replace(guid, 'https://karadstudio.com','https://eraartstudio.ir');
// UPDATE wp_posts SET post_content = replace(post_content, 'https://karadstudio.com', 'https://eraartstudio.ir');
// UPDATE wp_postmeta SET meta_value = replace(meta_value,'https://karadstudio.com','https://eraartstudio.ir');
// UPDATE wp_comments SET comment_author_url = REPLACE(comment_author_url, 'https://karadstudio.com', 'https://eraartstudio.ir');
