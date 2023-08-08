<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class NotLoggedIn
{
    /**
     * Handle an incoming request.
     * 
     * This middleware checks wether the user is logged in, and only lets users that are not logged in acces it. 
     * Used for Log in pages, since an authenticated user should not be able to log in twice.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if user is logged in, throw error
        if (Auth::check()) {

            return response('You must log out first.', 401);

        } else {

            return $next($request);
            
        }
    }
}
