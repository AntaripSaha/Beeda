<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdminMiddleware
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
        if(!session()->get('super_user_info'))
        {
          return redirect()->route('super.admin.login')->with('error_message', 'Unauthenticated access');
        }
        return $next($request);
    }
}
