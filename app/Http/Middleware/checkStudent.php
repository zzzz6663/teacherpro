<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkStudent
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
        if ($request->user()->level!='student'){
            return  redirect(route('login'));
        }
        return $next($request);
    }
}
