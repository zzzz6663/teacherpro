<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkTeacher
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
        if (! in_array($request->user()->level,['admin','teacher'])){
            return  redirect(route('login'));
        }
        return $next($request);
    }
}
