<?php

namespace App\Providers;

use App\Category;
use App\Language;
use App\Source;
use App\User;
use function foo\func;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*', function ($view) {
            $user    = auth()->user();
            $current = url()->current();
            $lang    = request()->lang;
            if ($lang)
                $current = substr($current, 0, strpos($current, $lang));

            $view->with([
                'user'    => $user,
                'current' => $current,
                'lang'    => $lang,
            ]);
        });
        view()->composer(['Home.shares.aside', 'Home.shares.header'], function ($view) {

            // cache()->pull("categories");
            
            $categories = cache()->remember('categories', 100 * 60, function () {
                return Category::all();
            });
            $categories = $categories->slice(0 , 8);
            $langs      = Language::take(1)->get();
            $view->with([
                'categories' => $categories,
                'langs'      => $langs,
            ]);
        });
        view()->composer(['Home.shares.sources'], function ($view) {

            $sources = Source::groupBy('name')->orderBy('name')->get()->pluck('name');
            $view->with([
                'sources' => $sources,
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
