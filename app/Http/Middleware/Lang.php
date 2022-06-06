<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = ($request->hasHeader('X-localization')) ? $request->header('X-localization') : 'ar';
        app()->setLocale($lang);
        return $next($request);
    }
}
