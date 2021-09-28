<?php

namespace App\Http\Middleware;

use App\Language;
use Closure;

class setLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = $request->lang;

        if (Language::whereAbbrev($lang)->first()){
            app()->setLocale($lang);
            
        }
        return $next($request);
        // return redirect()->to('/en');

    }
}
