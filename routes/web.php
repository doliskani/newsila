<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin'  , 'prefix' => 'admin', 'middleware' => ['auth']] , function (){
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');

    Route::resource('/advertisements', 'AdvertisementController');
    Route::post('/advertisements/publish/{advertisement}', 'AdvertisementController@publish');
    Route::post('/get-advertisements', 'AdvertisementController@getAdverts');

    Route::get('/all-posts', 'PostController@getAllPosts');
    Route::post('/posts/pagination', 'PostController@pagination');
    Route::post('/posts/search', 'PostController@search');

    Route::get('/profile', 'AdminController@profile')->name('profile.index');
    Route::post('/profile-update/{user}', 'AdminController@profileUpdate')->name('profile.update');

    Route::get('/security-edit/{user}', 'AdminController@securityEdit')->name('security.edit');
    Route::post('/security-update/{user}', 'AdminController@securityUpdate')->name('security.update');

    Route::get('/settings-edit', 'AdminController@settingsEdit')->name('settings.edit');
    Route::post('/settings-update', 'AdminController@settingsUpdate')->name('settings.update');
});

Route::get('/login', function (){
    return redirect()->to('/en/login');
});
Route::get('/logout', function (){
    return redirect()->to('/en/logout');
});


Route::group(['namespace' => 'Auth' ] , function (){

    Route::get('{lang}/login', 'LoginController@showLoginForm')->name('login');
    Route::post('{lang}/login', 'LoginController@login');
    Route::get('{lang}/logout', 'LoginController@logout')->name('logout');

// Password Reset Routes...
//    Route::get('password/reset/{lang}', 'ForgotPasswordController@showLinkRequestForm');
//    Route::post('password/email/{lang}', 'ForgotPasswordController@sendResetLinkEmail');
//    Route::get('password/reset/{token}/{lang}', 'ResetPasswordController@showResetForm');
//    Route::post('password/reset/{lang}', 'ResetPasswordController@reset');

});



Route::group(['namespace' => 'RSSReaders' , 'prefix' => 'rss'] , function (){
    Route::get('/save', 'RSSController@SavePostFromRSS');
    Route::get('/address', 'RSSController@SaveRSS');
    Route::get('/test', 'RSSController@testRSS');
});



Route::get('/', function (){
    return redirect()->to('/en');
});

Route::group(['namespace' => 'Home' , 'middleware' => ['setlocale'] ] , function (){
    // test route
    Route::get('/test/{lang}', 'HomeController@test');

    // home page
    Route::get('/{lang}', 'HomeController@index')->name('news.index');
    Route::post('/home/scroll/{lang}', 'HomeController@scrollInHome');
    Route::get('/home/like/{post}/{like}/{lang}', 'HomeController@like');

    // single
    Route::get('/{lang}/news/{postSlug}', 'PostController@showNews')->name('single');

    // category posts
    Route::get('/{lang}/categories/{categorySlug}', 'PostController@showCategoryPage')->name('news.cat');
    Route::post('/{lang}/categories/{categorySlug}', 'PostController@getCategoryNews');

    // tag posts
    Route::get('/{lang}/tags/{tagSlug}', 'PostController@showTagPage');
    Route::post('/{lang}/tags/{tagSlug}', 'PostController@getTagNews');

    // tag posts
    Route::get('/{lang}/favorites', 'PostController@showFavPage')->name('news.fav');
    Route::post('/{lang}/favorites', 'PostController@getFavNews');

    // tag posts
    Route::get('/{lang}/headlines', 'PostController@showHeadPage')->name('news.headlines');
    Route::post('/{lang}/headlines', 'PostController@getHeadNews');

    // search posts
    Route::post('/{lang}/search/{search}', 'HomeController@search');
    Route::post('/{lang}/search-page', 'HomeController@showSearchPage');
    Route::post('/{lang}/search-paginate/{search}', 'HomeController@searchPaginate');

    //custom search
    Route::post('/{lang}/custom-search', 'HomeController@showCustomSearchPage');
    Route::post('/{lang}/custom-search-paginate', 'HomeController@CustomSearchPaginate');

    //sources news
    Route::get('/{lang}/sources/{sourceName}', 'PostController@showSourcePage');
    Route::post('/{lang}/sources/{sourceName}', 'PostController@SourcePaginate');




});






