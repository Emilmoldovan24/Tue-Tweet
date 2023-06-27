<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller {

//--------------------------------------------------------------------------------------
    
    // Route: Profile
    public function getProfile() 
    {
        return view('profile');
    }

    // Route: Feed
    public function getFeed()
    {
        return view('feed');
    }

    // Route: Logout
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

    // Route: Settings
    public function getSettings()
    {
        return view('settings');
    }

//--------------------------------------------------------------------------------------
    
    // Function: Post Tweet
    public function postTweet(Request $request)
    {
        // image Validation
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
        $id = Auth::id();

        // empty tweets and empty image Validation
        if(is_null($request['tweet'])) {
            if(is_null($request['img'])) {
                $request->validate([
                    'image' => 'required',
                    'tweet' => 'required'
                ]);
            } 
            // image Validation
            else {
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'  
                ]);
                // image without text
                $image =  base64_encode(file_get_contents($request->file('img')->path()));
                DB::insert('insert into tweets(user_id, tweet, img, created_at) 
                values(?,?,?,?)', [$id, "", $image, $currentTimestamp]); // null statt "" hat nicht geklappt? Unschön
            }
        } 
        // text with or without image
        else {
            if(! is_null($request['img'])){
                $image =  base64_encode(file_get_contents($request->file('img')->path()));
            } else {
                $image = null;
            }
            DB::insert('insert into tweets(user_id, tweet, img, created_at) 
            values(?,?,?,?)', [$id, $request["tweet"], $image, $currentTimestamp]);
        }

        return Redirect::back();
    }

    // Function: Post Comment
    public function postComment(Request $request)
    {
        // empty comment Validation
        $request->validate([
            'comment' => 'required'
        ]);

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        $id = Auth::id();

        DB::insert('insert into comments(user_id, tweet_id, comment, created_at) 
        values(?,?,?,?)', [$id, $request["tweet_id"], $request["comment"], $currentTimestamp]);

        return Redirect::back();
    }

    // Function: Post Like
    public function postLike(Request $request)
    {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
        $id = Auth::id();

        $tweet_id = $request['tweet_id'];
        // like
        if (DB::table('likes')->where('tweet_id', $tweet_id)->where('user_id', $id)->doesntExist()) {
            DB::insert('insert into likes(user_id, tweet_id, created_at) 
            values(?,?,?)', [$id, $request["tweet_id"], $currentTimestamp]);
        } 
        // unlike
        else {
            DB::delete('delete from likes where user_id = ? and tweet_id = ?', [$id, $tweet_id]);
        }

        return Redirect::back();
    }

    // Function: Post Retweet
    public function postRetweet(Request $request)
    {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
        $tweet_id = $request['tweet_id'];
        $id = Auth::id();

        if ($request['retweet_text'] == null) {
            DB::insert('insert into retweets(user_id, tweet_id, created_at) 
            values(?,?,?)', [$id, $tweet_id, $currentTimestamp]);
        } else {
            DB::insert('insert into retweets(user_id, tweet_id, retweet_text, created_at) 
            values(?,?,?,?)', [$id, $tweet_id, $request["retweet_text"], $currentTimestamp]);
        }
        return Redirect::back();
    }

    // Edit Tweets
    public function editTweet(Request $request)
{ 
    // image Validation
    $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $id = $request->id;
    $editTweetText = $request->editTweetText;

    // Empty Tweet after Update Validation
    if (strlen(trim($editTweetText)) === 0) {
        if (trim(is_null($request['editImg']))) {
            $request->validate([
                'editTweetText' => 'required',
                'image' => 'required'
            ]);
        } else {
            // image without text
            $image =  base64_encode(file_get_contents($request->file('editImg')->path()));
            DB::table('tweets')->where('tweet_id', $id)->update(['tweet' => "", 'img' => $image]);
        }
    } else {
        if (!is_null($request['editImg'])) {
            $image =  base64_encode(file_get_contents($request->file('editImg')->path()));
        } else {
            $image = null;
        }
        
        DB::table('tweets')->where('tweet_id', $id)->update(['tweet' => $editTweetText, 'img' => $image]);
    }

    return redirect()->route('feed');
}

    // Delete Tweet
    public function MyTweetDelete(Request $request){
        
        $id = $request->id;
        DB::delete("delete from tweets where tweet_id = '$id'");
        

        return redirect()->route('feed');
    }


    //Edit Comment
    public function editComment(Request $request)
    { 

    $id= $request->id;
    $editCommentText= $request-> editCommentText;

    DB::table('comments')->where('comment_id', $id)->update(['comment' => $editCommentText]);

    return Redirect::back();
    }

    // Delete Tweet
    public function MyCommentDelete(Request $request){
        
        $id = $request->id;
        DB::delete("delete from comments where comment_id = '$id'");

        

        return redirect()->route('feed');
    }


//--------------------------------------------------------------------------------------
}
?>