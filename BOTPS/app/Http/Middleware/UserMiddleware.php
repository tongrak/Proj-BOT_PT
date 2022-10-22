<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        //if you are user
        if(Session::has('isAdmin')){
            if(Session::get('isAdmin') == 0){
                return $next($request);
            }
        }
        // if you are not user
        else{
            return redirect('test/home')->with('fail', 'You are not user.');
        }
            
    }
}
