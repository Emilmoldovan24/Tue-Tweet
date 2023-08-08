<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

class IsAdmin
{
    /**
     * Handle an incoming request. 
     * 
     * This middleware checks wether the user is an admin and does not allow other types of users to access this route.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if user is not logged in, then redirect him to the login
        if (Auth::check()) {

            // check the session
            $session = Session::all();

            // if user type is admin, then success, else throw error
            if($session['user_type'] == 'admin'){

                return $next($request);

            } else {

                return response('Unauthorized.', 401);

            }

        } else {

            return redirect()->route('adminLogin');

        }
    }
}

