<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

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

    // Profile Query
    public function getProfileQuery($profile_id, $myProfile){
        if($myProfile){
            $query = DB::select("SELECT id, user_id, created_at, typ, visibility, deleted_at, own_visibility
                            from (
                                SELECT tweet_id as id, user_id, created_at, 'tweet' as typ, visibility, own_visibility,  deleted_at
                                    from tweets 
                                    where deleted_at is null and visibility = 1 and user_id = " . $profile_id . "
                                    UNION
                                    SELECT retweet_id, user_id, created_at, 'retweet' as typ, visibility, own_visibility, deleted_at
                                    from retweets
                                    WHERE deleted_at is null and visibility = 1 and user_id = " . $profile_id . "
                            ) as feedTmp
                            ORDER BY created_at DESC");
        }else{
            $query = DB::select("SELECT id, user_id, created_at, typ, visibility, deleted_at, own_visibility
            from (
                SELECT tweet_id as id, user_id, created_at, 'tweet' as typ, visibility, own_visibility,  deleted_at
                    from tweets 
                    where deleted_at is null and visibility = 1 and user_id = " . $profile_id . "
                    UNION
                    SELECT retweet_id, user_id, created_at, 'retweet' as typ, visibility, own_visibility, deleted_at
                    from retweets
                    WHERE deleted_at is null and visibility = 1 and user_id = " . $profile_id . " and own_visibility = 1
            ) as feedTmp
            ORDER BY created_at DESC");
        }
        return $query;
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

    // Hide Tweet Profile
    public function hideTweetProfile(Request $request){
        
        $id = $request->id;
        $userId = DB::table('tweets')->where('tweet_id', $id)->value('user_id');
        $userDeletedAt = DB::table('users')->where('id', $userId)->value('deleted_at');
        $userExists = 0;
        if($userDeletedAt == NULL){
            $userExists = 1;
        }

        $tweet = DB::select("select * from tweets where tweet_id ='$id'");
        $tweetVis = DB::table('tweets')->where('tweet_id', $id)->value('own_visibility');

        if($tweetVis == 0){
            DB::update("update tweets set own_visibility = 1 where tweet_id = '$id'");
        }else{
            DB::update("update tweets set own_visibility = 0 where tweet_id = '$id'");
        }
        
        return redirect()->back();
    }

    // Edit Comment
    public function ProfileEditComment(Request $request)
    {

        $id = $request->id;
        $editCommentText = $request->editCommentText;

        DB::table('comments')->where('comment_id', $id)->update(['comment' => $editCommentText]);

        return Redirect::back();
    }

    public function ProfileCommentDelete(Request $request)
    {

        $id = $request->id;
        DB::delete("delete from comments where comment_id = '$id'");



        return redirect()->route('feed');
    }

    // Profile Retweet
    public function ProfileRetweet(Request $request)
    {
        $tweet_id = $request['tweet_id'];
        Log::info('You are about to retweet Tweet '.$tweet_id);

        return redirect()->route('feedForRetweet', ['id' => $tweet_id])->with('openRetweetModal', true);
    }

    // Delete Retweet
    public function MyProfileRetweetDelete(Request $request){

        $id = $request->id;
        DB::delete("delete from retweets where retweet_id = '$id'");

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

    public function postPassword(Request $request)
    {
        // empty Username Post, max and unique Validation
        $request->validate([
            'user_password' => 'required|max:120|min:4|unique:users'
        ]);

        $id = Auth::id();
        $user_password =  $request->user_password;
        DB::table('users')->where('id', $id)->update(['user_password' => bcrypt($user_password)]);

        return redirect()->route('settings');
    }

    // Function: Safe Twitter Data as .txt file
    public function safeFile(Request $request)
    {
        $id = Auth::id();
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d-H-i', $currentTimeString);

        //get user info
        $user = DB::table('users')->where('id', $id)->value('username');
        $userID = DB::table('users')->where('id', $id)->value('id');
        $created = DB::table('users')->where('id', $id)->value('created_at');
        $tweets = DB::table('tweets')->where('user_id', $id)->get();
        $comments = DB::table('comments')->where('user_id', $id)->get();
        $retweets = DB::table('retweets')->where('user_id', $id)->get();
        $tweetPics = DB::table('tweets')->where('user_id', $id)->where('img', '<>', NULL)->get();
        $likes = DB::table('likes')->where('user_id', $id)->get();
        $follows = DB::table('follows')->select('follows.*', 'users.username')->join('users', 'follows.follow_user_id', '=', 'users.id')->where('follows.following_user_id', $id)->get();
        $followings = DB::table('follows')->join('users', 'follows.following_user_id', '=', 'users.id')->where('follows.follow_user_id', $id)->select('users.username', 'follows.created_at')->get();

        //generate filename, creates a new file one minute after used. if used multiple times in one min it overrides the file
        $filename = $currentTimestamp . '_' . $userID . '_' . $user . '.txt';
        $contents = 'Information for user: ' . $user . ' / ID: ' . $userID . "\n\n";
        $contents .= 'User was created at: ' . $created . "\n\n";

        //get user tweeets
        if ($tweets->count() > 0) {
            $contents .= 'TWEETS:' . "\n";
            foreach ($tweets as $tweet) {
                if ($tweet->tweet <> NULL) {
                    $contents .= '- ' . $tweet->tweet .  "\n" . ' tweeted on ' . $tweet->created_at . "\n\n";
                }
            }
        }
        //get user comments
        if ($comments->count() > 0) {
            $contents .= 'COMMENTS:' . "\n";
            foreach ($comments as $comment) {
                if ($comment->tweet_id <> Null) {
                    $contents .= '- ' . $comment->comment . "\n" . 'commented Tweet with TweetID ' . $comment->tweet_id . ' on ' . $comment->created_at . "\n\n";
                } else $contents .= '- ' . $comment->comment . "\n" . 'commented Retweet with RetweetID ' . $comment->retweet_id . ' on ' . $comment->created_at . "\n\n";
            }
        }
        //get user retweets
        if ($retweets->count() > 0) {
            $contents .= 'RETWEETS:' . "\n";
            foreach ($retweets as $retweet) {
                $contents .= '- ' . $retweet->retweet_text . "\n" . 'retweeted Tweet with TweetID ' . $retweet->tweet_id . ' on ' . $retweet->created_at . "\n\n";
            }
        }
        //get user likes
        if ($likes->count() > 0) {
            $contents .= 'LIKES:' . "\n";
            foreach ($likes as $like) {
                if ($like->tweet_id <> NULL) {
                    $contents .= '- Has liked the Tweet with TweetID ' . $like->tweet_id . ' on ' . $like->created_at . "\n\n";
                } else $contents .= '- Has liked the Retweet with ReetweetID ' . $like->retweet_id . ' on ' . $like->created_at . "\n\n";
            }
        }
        //get user follows
        if ($follows->count() > 0) {
            $contents .= 'Follows:' . "\n";
            foreach ($follows as $follow)
                $contents .= '- Has followed  ' . $follow->username . ' on ' . $follow->created_at . "\n\n";
        }
        //get user following
        if ($followings->count() > 0) {
            $contents .= 'Following:' . "\n";
            foreach ($followings as $following)
                $contents .= '-' . $following->username . ' Following you since ' . $following->created_at . "\n\n";
        }
        //get user tweet-pictures
        if ($tweetPics->count() > 0) {
            $contents .= 'TWEET-Pictures:' . "\n";
            foreach ($tweets as $tweet) {
                if ($tweet->img <> NULL) {
                    $contents .= '- ' . $tweet->img .  "\n" . ' tweeted on ' . $tweet->created_at . "\n\n";
                }
            }
        }


        Storage::put($filename, $contents);
        //safe file in root\to\Tue-Tweet\Tue_Tweet\storage\app
        $filePath = storage_path('app/' . $filename);
        $fileSize = filesize($filePath);

        Storage::download($filePath, $filename, ['Content-Length' => $fileSize]);

        Response::download($filePath);


        return redirect()->back();
    }

    //--------------------------------------------------------------------------------------

}
