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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Auth::check()){
            $session = Session::all();
            if($session['user_type'] == 'admin'){
                $admin_id = Auth::id();
                $super = DB::table('admins')->where('id', $admin_id)->value('super_admin');

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
