<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function getAdminLogIn(){
        return view('adminLogIn');
    }
    public function getAdminCreate(){
        return view('adminCreate');
    }
    public function getAdminDash(){
        return view('adminDashboard');
    }
    public function getAdminUsers(){
        return view('adminUserFeed');
    }
    public function getAdminFeed(){
        return view('adminFeed');
    }
    public function getAdminLogout()
    {
        Auth::logout();
        return redirect()->route('adminLogin');
    }

    public function postCreateAdmin(Request $request) {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);

        //validation
        $this->validate($request, [
            'email' => 'email|unique:users', 
            'adminname' => 'required|max:120',
            'user_password' => 'required|min:4'
        ]);

        
        $email = $request['email'];
        $adminname = $request['adminname'];
        $user_password = bcrypt($request['user_password']);

        //Create new admin
        $admin = new Admin();
        $admin->email = $email;
        $admin->adminname = $adminname;
        $admin->user_password = $user_password;

        $admin->save();

        return redirect()->route('adminCreate');
        

    }

    public function postAdminLogIn(Request $request){
    
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'user_password' => ['required'],
        ]);
        
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->user_password, $admin->user_password)) {
                // Admin gefunden und Passwort ist korrekt
                Auth::login($admin);
            return redirect()->route('adminDash');
        } else {
            // Admin nicht gefunden oder Passwort ist falsch
            return redirect()->back()->withErrors(['admin_password' => 'Check if the password or email is correct.'])->withInput();
            
        }
    }

    public function deleteTweet(Request $request){
        
        $id = $request->id;
        DB::delete("delete from tweets where tweet_id = '$id'");
        

        return redirect()->route('adminFeed');
    }

    public function deleteAdmin(Request $request){
        
        $id = $request->id;
        DB::delete("delete from admins where id = '$id'");
        
        return redirect()->route('adminCreate');
    }

    public function hideTweet(Request $request){
        
        $id = $request->id;
        $userId = DB::table('tweets')->where('tweet_id', $id)->value('user_id');
        $userDeletedAt = DB::table('users')->where('id', $userId)->value('deleted_at');
        $userExists = 0;
        if($userDeletedAt == NULL){
            $userExists = 1;
        }

        $tweet = DB::select("select * from tweets where tweet_id ='$id'");
        $tweetVis = DB::table('tweets')->where('tweet_id', $id)->value('visibility');

        if($tweetVis == 0){
            DB::update("update tweets set visibility = 1 where tweet_id = '$id'");
        }else{
            DB::update("update tweets set visibility = 0 where tweet_id = '$id'");
        }

        
        
        
        return redirect()->route('adminFeed');
    }

    public function deleteUser(Request $request){

        $id = $request->id;

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        DB::update("update users set deleted_at = '$currentTimestamp' where id = '$id'");

        DB::update("update tweets set visibility = 0 where user_id = '$id'");

        return redirect()->back();

    }


    //will need to be implemented
    public function restoreUser(Request $request){

        $id = $request->id;
        $userId = DB::table('tweets')->where('tweet_id', $id)->value('user_id');
        DB::update("update users set deleted_at = NULL where id = '$userId'");
        DB::update("update tweets set visibility = 1 where user_id = '$userId'");
        
        return redirect()->back();
    }



    //TODO: delte/hide/unhide reply
}
