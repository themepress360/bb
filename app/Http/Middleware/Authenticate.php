<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Auth;
use Illuminate\Http\Request;

use URL;

class Authenticate extends Middleware
{
    public function handle(Request $request, Closure $next)
    {
        //$user =  $request->user();
        //dd($user);
        // if($user == null)
        // {
        //     dd($user);
        
        //     // return \Redirect::to('login');
        // }
        // return URL::to('/login');
        //return route('/login');
        return $next($request);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}

