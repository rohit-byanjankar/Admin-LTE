<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Http\Controllers\Controller;


class CheckDeactivate
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
        if (Auth::check()) //checks if user is logged in ,return true if logged in
                {
                if(Auth::user()->deactivated == 0) //checks if user is deactivated
                {
                    return $next($request);//send to next request if user isn't deactivated
                }else{
                    return redirect('/deactivated');
                }
            }else{
                    return redirect('/login');//if user is not logged in redirect him to login page
                 }
     }
}
