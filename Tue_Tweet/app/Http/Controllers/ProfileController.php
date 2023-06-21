<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $profileUsername = $username;
        /*$profile = User::where('username', $this->profileUsername)->first();
        $profileID = $profile->id;
        $profilePic = $profile->profile_img;
        $profileBio = $profile->profile_bio;*/

        return view('profile', compact('profileUsername'));
    }

    // Function: Post Follow
    public function postFollow(Request $request)
    {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
        $following_user_id = Auth::id();

        $follow_user_id = $request['follow_user_id'];
        // follow
        if (DB::table('follows')->where('following_user_id', $following_user_id)->where('follow_user_id', $follow_user_id)->doesntExist()) {
            DB::insert('insert into follows(follow_user_id, following_user_id, created_at) 
            values(?,?,?)', [$follow_user_id, $following_user_id, $currentTimestamp]);
        }
        // unfollow
        else {
            DB::delete('delete from follows where following_user_id = ? and follow_user_id = ?', [$following_user_id, $follow_user_id]);
        }
        return Redirect::back();
    }

    // Edit Tweets
    public function editProfileTweet(Request $request)
    {
        // image Validation
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $id = $request->id;
        $editProfileTweetText = $request->editProfileTweetText;

        // Empty Tweet after Update Validation
        if (strlen(trim($editProfileTweetText)) === 0) {
            if (trim(is_null($request['editProfileImg']))) {
                $request->validate([
                    'editProfileTweetText' => 'required',
                    'image' => 'required'
                ]);
            } else {
                // image without text
                $image =  base64_encode(file_get_contents($request->file('editProfileImg')->path()));
                DB::table('tweets')->where('tweet_id', $id)->update(['tweet' => "", 'img' => $image]);
            }
        } else {
            if (!is_null($request['editProfileImg'])) {
                $image =  base64_encode(file_get_contents($request->file('editProfileImg')->path()));
            } else {
                $image = null;
            }

            DB::table('tweets')->where('tweet_id', $id)->update(['tweet' => $editProfileTweetText, 'img' => $image]);
        }
        return Redirect::back();
    }

    // Delete Tweet
    public function ProfileTweetDelete(Request $request)
    {

        $id = $request->id;
        DB::delete("delete from tweets where tweet_id = '$id'");


        return Redirect::back();
    }

    //----------------------Profile Settings----------------------------------------------------------------------------------------------------------

    // Function: Update Image 
    public function postImage(Request $request)
    {
        // empty Image and Image Validation
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $id = Auth::id();
        $image =  base64_encode(file_get_contents($request->file('img')->path()));
        DB::table('users')->where('id', $id)->update(['profile_img' => $image]);

        return redirect()->route('settings');
    }

    // Function: Update Profile Biography
    public function postBio(Request $request)
    {
        // empty Bio Post and max Validation
        $request->validate([
            'bio' => 'required|max:50'
        ]);

        $id = Auth::id();
        $bio =  $request->bio;
        DB::table('users')->where('id', $id)->update(['profile_bio' => $bio]);

        return redirect()->route('settings');
    }

    // Function: Update Username
    public function postUsername(Request $request)
    {
        // empty Username Post, max and unique Validation
        $request->validate([
            'username' => 'required|max:120|unique:users'
        ]);

        $id = Auth::id();
        $username =  $request->username;
        DB::table('users')->where('id', $id)->update(['username' => $username]);

        return redirect()->route('settings');
    }

    // Function: Update Email
    public function postEmail(Request $request)
    {
        // empty email, email format and unique Validation
        $request->validate([
            'email' => 'required|email|unique:users'
        ]);

        $id = Auth::id();
        $email =  $request->email;
        DB::table('users')->where('id', $id)->update(['email' => $email]);

        return redirect()->route('settings');
    }

    // Function: Safe Twitter Data as .txt file
    public function safeFile(Request $request)
    {

        $id = Auth::id();
        $name = DB::table('users')->where('id', $id)->value('username');

        //hier müssen wir noch irgendwie erstellen das man einen Pfad dazu aussuchen kann
        $filePath = 'F:/Studium/Teamprojekt/downloadFiles/' . $name . '_Informations.txt'; // Path to the .txt-file

        $tweets = DB::table('tweets')->where('user_id', $id)->get(); // Retrieve tweets of the user

        $comments = DB::table('comments')->where('user_id', $id)->get(); // Retrieve tweets of the user

        $retweets = DB::table('retweets')->where('user_id', $id)->get(); // Retrieve retweets of the user

        if ($tweets->count() > 0 || $retweets->count() > 0 || $comments->count() > 0) {

            $content = 'Here is all the information about the user ' . $name . ":\n\n";
            $content .= "\nThe Profile Biography is as follows: " . $name . ":\n\n";
            $content .= "\n" . DB::table('users')->where('id', $id)->value('profile_bio') . "\n\n";
            $content .= "\nThese are the tweets from User " . $name . ":\n\n";
            foreach ($tweets as $tweet) {
                $content .= $tweet->tweet . "\n"; // Add Tweets to the content 
            }
            $content .= "\nThese are the comments from User " . $name . ":\n\n";
            foreach ($comments as $comment) {
                $content .= $comment->comment . "\n"; // Add comments to the content
            }
            $content .= "\nThese are the Retweets from User " . $name . ":\n\n";
            foreach ($retweets as $retweet) {
                $content .= $retweet->retweet_text . "\n"; // Add retweets to the content
            }
            file_put_contents($filePath, $content); // safe .txt file     
        }
        return redirect()->route('settings');
    }


    //--------------------------------------------------------------------------------------

}
