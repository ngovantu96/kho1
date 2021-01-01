<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $cus;
    public function handle(Request $request, Closure $next,$guard = 'cus')
    {
        if(Auth::guard($guard)->check()){
            return $next($request);
        }
            return redirect()->route('home');
    }
}
