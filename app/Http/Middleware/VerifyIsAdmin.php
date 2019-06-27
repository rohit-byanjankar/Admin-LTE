<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifyIsAdmin
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
        if (Auth::check()){//checks if user is logged in ,return true if logged in
            if (Auth::user()->role=='admin' || Auth::user()->role=='superadmin') {//checks role of currently logged in user
                return $next($request);//if user is admin send to next request
            }else{
                return abort(403, 'You dont have permission to Admin Panel.');//if user isn't admin display error
            }
        }else{
            return redirect('/login');//if user is not logged in redirect him to login page
        }
    }
}
