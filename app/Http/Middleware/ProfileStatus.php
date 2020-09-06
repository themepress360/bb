<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class ProfileStatus
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
        $user =  $request->user();

        if($user == null)
            return \Redirect::to('/login');
        if(!$user['status'])
            return \Redirect::to('/login');
        if($user['deleted'])
            return \Redirect::to('/login');
        return $next($request);
    }
}
