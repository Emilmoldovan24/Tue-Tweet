<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function getDashboard(){
        return view('dashboard');
    }    

    public function getwelcome(){
        return view('welcome');
    }

    public function getFeed(){
        return view('feed');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function postSignUp(Request $request) {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);

        $this->validate($request, [
            'email' => 'required|email|unique:users', //nach dem doppelpunkt, sagt es dass es in der users Datenbank unique sein soll
            'username' => 'required|max:120|unique:users',
            'user_password' => 'required|min:4'
        ]);
        $email = $request['email'];
        $username = $request['username'];
        $user_password = bcrypt($request['user_password']);

        $user = new User();
        $user->email = $email;
        $user->username = $username;
        $user->user_password = $user_password;

        $user->save();

        $usr = User::where('email', $request->email)->first();
        Auth::login($usr);

        return redirect()->route('feed');

    }

    
    public function postSignIn(Request $request) {
        $this->validate($request, [
            'email' => 'required', 
            'user_password' => 'required'
        ]); 
        
        $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->user_password, $user->user_password)) {
        // Benutzer gefunden und Passwort ist korrekt
        Auth::login($user);
        return redirect()->route('feed');
    } else {
        // Benutzer nicht gefunden oder Passwort ist falsch  
        return redirect()->back()->withErrors(['user_password' => 'Check if the password or email is correct.'])->withInput();
    }
        
    }


    public function postTweet(Request $request){

        // Leere Tweets abfangen
        $request->validate([
            'tweet' => 'required',
        ]);

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);
        $id = Auth::id();

        DB::insert('insert into tweets(user_id, tweet, img, created_at) 
        values(?,?,?,?)',[$id, $request["tweet"], NULL ,$currentTimestamp]);

        return redirect()->route('feed');
    }

    public function postComment(Request $request){
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);

        $id = Auth::id();

        DB::insert('insert into comments(user_id, tweet_id, comment, created_at) 
        values(?,?,?,?)',[$id, $request["tweet_id"], $request["comment"], $currentTimestamp]);

        return redirect()->route('feed');
    }

    public function postLike(Request $request){

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);
        $id = Auth::id();

        $tweet_id = $request['tweet_id'];
        if (DB::table('likes')->where('tweet_id', $tweet_id)->where('user_id', $id)->doesntExist()){
            DB::insert('insert into likes(user_id, tweet_id, created_at) 
            values(?,?,?)',[$id, $request["tweet_id"], $currentTimestamp]);

        } else {
            DB::delete('delete from likes where user_id = ? and tweet_id = ?', [$id, $tweet_id]);
        }
        

        return redirect()->route('feed');
    }

    // no possibility to retweet a retweet !!
    public function postRetweet(Request $request){

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);
        $id = Auth::id();

        $tweet_id = $request['tweet_id'];

        DB::insert('insert into retweets(user_id, tweet_id, retweet_text, created_at) 
        values(?,?,?,?',[$id, $request["tweet_id"], $request["retweet_text"], $currentTimestamp]);
    
        return redirect()->route('feed');
    }

}