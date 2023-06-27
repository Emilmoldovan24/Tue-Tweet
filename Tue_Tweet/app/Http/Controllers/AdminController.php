<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


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

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        DB::update("update tweets set deleted_at = '$currentTimestamp' where tweet_id = '$id'");

        DB::update("update tweets set visibility = 0 where tweet_id = '$id'");

        return redirect()->back();
    }

    public function restoreTweet(Request $request){
        
        $id = $request->id;
        DB::update("update tweets set deleted_at = null where tweet_id = '$id'");
        DB::update("update tweets set visibility = 1 where tweet_id = '$id'");
        
        return redirect()->back();
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

    public function restoreUser(Request $request){

        $id = $request->id;
       // $userId = DB::table('tweets')->where('tweet_id', $id)->value('user_id');
        DB::update("update users set deleted_at =  null where id = '$id'");
        DB::update("update tweets set visibility = 1 where user_id = '$id'");
        
        return redirect()->back();
    }

    public function safeUserInfo(Request $request){
        $id = $request->id;
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d-H-i', $currentTimeString);
    
        //get user info
        $user = DB::table('users')->where('id', $id)->value('username');
        $userID = DB::table('users')->where('id', $id)->value('id');
        $created = DB::table('users')->where('id', $id)->value('created_at');
        $deleted = DB::table('users')->where('id', $id)->value('deleted_at');
        $tweets = DB::table('tweets')->where('user_id', $id)->get(); 
        $comments = DB::table('comments')->where('user_id', $id)->get(); 
        $retweets = DB::table('retweets')->where('user_id', $id)->get(); 


        //generate filename, creates a new file one minute after used. if used multiple times in one min it overrides the file
        $filename = $currentTimestamp.'_'.$userID.'_'.$user .'.txt';
        $contents = 'Information for user: '.$user.' / ID: '.$userID. "\n\n";
        $contents .= 'User was created at: '.$created. "\n\n";

        if($deleted != NULL){
            $contents .= 'User was deleted at: '.$deleted. "\n\n";
        }

        //get user tweeets
        if($tweets->count() > 0){
            $contents .= 'TWEETS:'."\n";
            foreach ($tweets as $tweet) {
                $contents .= '- '. $tweet->tweet . "\n\n";
            }
        }
        //get user comments
        if($comments->count() > 0){
            $contents .= 'COMMENTS:'."\n";
            foreach ($comments as $comment) {
                $contents .= '- '.$comment->comment . "\n\n";
            }
        }
        //get user retweets
        if($retweets->count() > 0){
            $contents .= 'RETWEETS:'."\n";
            foreach ($retweets as $retweet) {
                $contents .= '- '.$retweet->retweet_text . "\n\n";
            }
        }
        //safe file in root\to\Tue-Tweet\Tue_Tweet\storage\app
        Storage::put($filename, $contents);
        return redirect()->back();
    }
}
