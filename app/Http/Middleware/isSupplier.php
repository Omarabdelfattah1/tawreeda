<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isSupplier
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
        if(!auth()->user()->userable instanceof \App\Models\Supplier){
            
            abort(404);
        }
        return $next($request);
    }
}
