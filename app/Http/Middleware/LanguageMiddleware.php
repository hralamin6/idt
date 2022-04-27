<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if(session()->has('my_locale'))
            App::setLocale(session()->get('my_locale'));
        else
            app()->setLocale(config('app.locale'));
        return $next($request);
    }
}
