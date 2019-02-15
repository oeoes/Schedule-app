<?php

namespace App\Http\Middleware;

use Closure;

class DosenMiddleware
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
        if(auth()->user()->role != 'dosen')
        {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
