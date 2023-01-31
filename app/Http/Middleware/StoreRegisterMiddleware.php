<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StoreRegisterMiddleware
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
        if(!session()->get('user_info'))
        {
          return redirect()->route('login.login');  
        }
        return $next($request);

    }
}
