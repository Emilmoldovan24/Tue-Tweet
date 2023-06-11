<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function getSettings()
    {
        return view('settings');
    }

    public function getVerify()
    {
        return view('verify');
    }

    public function getwelcome()
    {
        return view('welcome');
    }

    public function getFeed()
    {
        return view('feed');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function postSignUp(Request $request)
    {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

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
        //Mail::to($email)->send(new WelcomeMail());

        return redirect()->route('feed');//anstatt feed view erstmal mail verifizieren
    }


    public function postSignIn(Request $request)
    {
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


    // Post Tweet
    public function postTweet(Request $request)
    {

        // Leere Tweets abfangen & Bilder-Regeln
        $request->validate([
            'tweet' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validierungsregeln für das Bild
        ]);

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
        $id = Auth::id();

        if(! is_null($request['img'])){
        $image =  base64_encode(file_get_contents($request->file('img')->path()));
        } else {
            $image = null;
        }

        DB::insert('insert into tweets(user_id, tweet, img, created_at) 
        values(?,?,?,?)', [$id, $request["tweet"], $image, $currentTimestamp]);

        return redirect()->route('feed');
    }


    // Post Comment
    public function postComment(Request $request)
    {
        // Muss man glaub nicht optisch darstellen, wenn ihr wollte gibt Julia bescheid
        $request->validate([
            'comment' => 'required'
        ]);

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        $id = Auth::id();

        DB::insert('insert into comments(user_id, tweet_id, comment, created_at) 
        values(?,?,?,?)', [$id, $request["tweet_id"], $request["comment"], $currentTimestamp]);

        return redirect()->route('feed');
    }


    // Post Like
    public function postLike(Request $request)
    {

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
        $id = Auth::id();

        $tweet_id = $request['tweet_id'];
        if (DB::table('likes')->where('tweet_id', $tweet_id)->where('user_id', $id)->doesntExist()) {
            DB::insert('insert into likes(user_id, tweet_id, created_at) 
            values(?,?,?)', [$id, $request["tweet_id"], $currentTimestamp]);
        } else {
            DB::delete('delete from likes where user_id = ? and tweet_id = ?', [$id, $tweet_id]);
        }


        return redirect()->route('feed');
    }

    
    // Post Retweet
    public function postRetweet(Request $request)
    {

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
        $id = Auth::id();

        $tweet_id = $request['tweet_id'];

        DB::insert('insert into retweets(user_id, tweet_id, retweet_text, created_at) 
        values(?,?,?,?', [$id, $request["tweet_id"], $request["retweet_text"], $currentTimestamp]);

        return redirect()->route('feed');
    }


    // Store Image
    public function postImage(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $id = Auth::id();

        $image =  base64_encode(file_get_contents($request->file('img')->path()));
        DB::table('users')
            ->where('id', $id)
            ->update(['profile_img' => $image]);

        return redirect()->route('settings');
    }


    // Update Profile Biography
    public function postBio(Request $request)
    {
        $request->validate([
            'bio' => 'required|max:50'
        ]);

        $id = Auth::id();
        #dd($request);
        $bio =  $request->bio;
        DB::table('users')
            ->where('id', $id)
            ->update(['profile_bio' => $bio]);

        return redirect()->route('settings');
    }


    //Update Username
    public function postUsername(Request $request)
    {
        $request->validate([
            'username' => 'required|max:120|unique:users'
        ]);

        $id = Auth::id();
        #dd($request);
        $username =  $request->username;
        DB::table('users')
            ->where('id', $id)
            ->update(['username' => $username]);

        return redirect()->route('settings');
    }


    //Update Email
    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users'
        ]);

        $id = Auth::id();
        #dd($request);
        $email =  $request->email;
        DB::table('users')
            ->where('id', $id)
            ->update(['email' => $email]);

        return redirect()->route('settings');
    }


    //ist das gut wenn man das so macht?
    public function getUserImgHtml($userImg)
    {
        if (is_null($userImg)) {
            $userImgHtml = '<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png">';
        } else {
            $userImgHtml = '<img src=data:image/png;base64,' . $userImg . '>';
        }
        return $userImgHtml;
    }


    public function getUserImg($userImg)
    {
        if (is_null($userImg)) {
            $ret = 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png';
        } else {
            $ret = 'data:image/png;base64,' . $userImg;
        }
        return $ret;
    }
}
