<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && auth()->user()->role=='admin')
            {
                return $next($request);   //check if auth has any user? and that user role is admin??(if both condition is true, proceed with other request calling)
            }
            abort(403); 
    }
}
