<?php

namespace App\Http\Middleware;

use Closure;

class PickAccountMiddleware
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
        if(auth()->user()->pick_account == '0')
        {
            return redirect()->route('claim');
        }
        return $next($request);
    }
}
