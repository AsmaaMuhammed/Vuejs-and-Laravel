<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class LocalLanguage
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
        $user = auth()->user();
        if($user){
            app()->setLocale($user->locale);
        }elseif($locale = Session::has('lang')){
            app()->setLocale($locale);
        }
        return $next($request);
    }
}
