<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isBuyer
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
        if(!auth()->user()->userable instanceof \App\Models\Buyer){
            
            abort(404);
        }
        return $next($request);
    }
}
