<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class IsUserLogin
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
        if(!empty($user))
        {
            if($user['type'] == "admin")
                return \Redirect::to('admin/dashboard');
            elseif($user['type'] == "client")
                return \Redirect::to('client/dashboard');
            else
                return \Redirect::to('employee/dashboard');
        }
        return $next($request);
    }
}
