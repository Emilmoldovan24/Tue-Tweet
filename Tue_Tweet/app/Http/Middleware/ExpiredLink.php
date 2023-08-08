<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpiredLink
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if the link is not valid or has expired, throw error, else success
        if (! $request->hasValidSignature()) {

            return response('Link not valid.', 401);
            
        } else {

            return $next($request);
            
        }
    }
}
