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

    public function getAdminFeed(){
        return view('adminFeed');
    }

    public function postAdminSignUp(Request $request) {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);

        $this->validate($request, [
            'email' => 'email|unique:users', 
            'adminname' => 'required|max:120',
            'user_password' => 'required|min:4'
        ]);


        $email = $request['email'];
        $adminname = $request['adminname'];
        $user_password = bcrypt($request['user_password']);

        $admin = new Admin();
        $admin->email = $email;
        $admin->adminname = $adminname;
        $admin->user_password = $user_password;

        $admin->save();

        Auth::login($admin);

        return redirect()->route('adminFeed');

    }

    public function postAdminLogIn(Request $request){
    
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'user_password' => ['required'],
        ]);
        
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->user_password, $admin->user_password)) {
                // Admin gefunden und Passwort ist korrekt
            return redirect()->route('adminFeed');
        } else {
            // Admin nicht gefunden oder Passwort ist falsch
            return redirect()->back();
            
        }
    }

    public function deleteTweet(Request $request){
        
        $id = $request->id;
        DB::delete("delete from tweets where tweet_id = '$id'");
        

        return redirect()->route('adminFeed');
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

        return redirect()->route('adminFeed');

    }


    //will need to be implemented
    public function restoreUser(Request $request){

        $id = $request->id;
        $userId = DB::table('tweets')->where('tweet_id', $id)->value('user_id');
        DB::update("update users set deleted_at = NULL where id = '$userId'");
        DB::update("update tweets set visibility = 1 where user_id = '$userId'");
        
        return redirect()->route('adminFeed');
    }
}
