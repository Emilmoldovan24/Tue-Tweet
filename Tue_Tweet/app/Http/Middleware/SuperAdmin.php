<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * This middleware checks wether the user is a super admin and does not allow other types of users to access this route.
     * Used for the adminCreate route since only super admins can create new admins.
     * 
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if user is not logged in, then redirect him to the login
        if(Auth::check()){

            // check the session
            $session = Session::all();

            // if user type is not admin, throw error
            if($session['user_type'] == 'admin'){

                // check the database to see if user is super admin
                $admin_id = Auth::id();
                $super = DB::table('admins')->where('id', $admin_id)->value('super_admin');

                // if user is super admin, success, else throw error
                if($super == 1){

                return $next($request);

                }else{

                return response('Unauthorized.', 401);

                }

            } else {

                return response('Unauthorized.', 401);

            }

        } else {

            return redirect()->route('adminLogin');
            
        }
        
    }
}
