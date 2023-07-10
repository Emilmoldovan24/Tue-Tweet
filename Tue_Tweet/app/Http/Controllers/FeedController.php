<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserNotifications;

use App\Http\Controllers\Controller;



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
        $user = Auth::user();
        Log::info("User logged out!");
        Auth::logout();
        return redirect()->route('welcome');
    }

    // Route: Settings
    public function getSettings()
    {
        return view('settings');
    }

//--------------------------------------------------------------------------------------
    
    public function markAllAsRead()
    {
        $user = Auth::user();

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return redirect()->back();
    }

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

        $tweet_typ = $request['tweet_typ'];
        $tweet_id = $request["tweet_id"];
        $user_id = $request['user_id'];
        $id = Auth::id();

        // depending on the tweet_typ (tweet or retweet), the comment is inserted into the corresponding column
        DB::insert('insert into comments(user_id, '. $tweet_typ .'_id, comment, created_at) 
        values(?,?,?,?)', [$id, $tweet_id, $request["comment"], $currentTimestamp]);

        // Retrieve the user receiving the notification
        $notifiableUser = User::find($user_id);

        // Send Notification
        Notification::sendNow($notifiableUser, new UserNotifications($id, $tweet_id, $tweet_typ, 'comment'));

        return Redirect::back();
    }

    // Function: Post Like
    public function postLike(Request $request)
    {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
        $id = Auth::id();

        $typ = $request['typ'];
        $tweet_id = $request[$typ."_id"];
        $user_id = $request['user_id'];
        

        // like
        if (DB::table('likes')->where($typ.'_id', $tweet_id)->where('user_id', $id)->doesntExist()) {
            DB::insert('insert into likes(user_id, '.$typ.'_id, created_at) 
            values(?,?,?)', [$id, $tweet_id, $currentTimestamp]);

            // Retrieve the user receiving the notification
            $notifiableUser = User::find($user_id);

            // Send Notification
            Notification::sendNow($notifiableUser, new UserNotifications($id, $tweet_id, $typ, 'like'));
        } 
        // unlike
        else {
            DB::delete('delete from likes where user_id = ? and '.$typ.'_id = ?', [$id, $tweet_id]);
        }

        return redirect()->back();
    }

    // Function: Post Retweet
    public function postRetweet(Request $request)
    {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);
        $tweet_id = $request['tweet_id'];
        $id = Auth::id();
        $user_id = $request['user_id'];

        if ($request['retweet_text'] == null) {
            DB::insert('insert into retweets(user_id, tweet_id, created_at) 
            values(?,?,?)', [$id, $tweet_id, $currentTimestamp]);
        } else {
            DB::insert('insert into retweets(user_id, tweet_id, retweet_text, created_at) 
            values(?,?,?,?)', [$id, $tweet_id, $request["retweet_text"], $currentTimestamp]);
        }

        // Retrieve the user receiving the notification
        $notifiableUser = User::find($user_id);

        // Send Notification
        Notification::sendNow($notifiableUser, new UserNotifications($id, $tweet_id, 'retweet','retweet'));

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

    // Hide Tweet

    public function hideTweetFeed(Request $request){
        
        $id = $request->id;
        $typ = $request->typ;
        $table = $typ."s";

        $userId = DB::table($table)->where($typ.'_id', $id)->value('user_id');

        $tweet = DB::select("select * from ".$table." where ".$typ."_id ='$id'");
        $tweetVis = DB::table($table)->where($typ.'_id', $id)->value('own_visibility');

        if($tweetVis == 0){
            DB::update("update ".$table." set own_visibility = 1 where ".$typ."_id = '$id'");
        }else{
            DB::update("update ".$table." set own_visibility = 0 where ".$typ."_id = '$id'");
        }
        
        return redirect()->back();
    }


    //Edit Comment
    public function editComment(Request $request)
    { 

    $id= $request->id;
    $editCommentText= $request->editCommentText;

    DB::table('comments')->where('comment_id', $id)->update(['comment' => $editCommentText]);

    return Redirect::back();
    }

    //Edit Retweets
    public function editRetweet(Request $request)
    { 

    $id= $request->retweet_id;
    $editRetweetText= $request->editRetweetText;

    DB::table('retweets')->where('retweet_id', $id)->update(['retweet_text' => $editRetweetText]);

    return Redirect::back();
    }

    // Delete Tweet
    public function MyCommentDelete(Request $request){
        
        $id = $request->id;
        DB::delete("delete from comments where comment_id = '$id'");

        

        return redirect()->route('feed');
    }

    // Delete Retweet
    public function MyRetweetDelete(Request $request){
        
        $id = $request->id;
        DB::delete("delete from retweets where retweet_id = '$id'");
        

        return redirect()->route('feed');
    }

    // Sortierungen
    
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'default');
    
        $query = "SELECT id, user_id, created_at, typ
                  FROM (
                      SELECT 'tweet' as typ, tweets.tweet_id AS id, tweets.user_id, tweets.tweet, tweets.created_at, COUNT(likes.like_id) AS like_count
                      FROM tweets
                      LEFT JOIN likes ON tweets.tweet_id = likes.tweet_id
                      WHERE tweets.deleted_at IS NULL AND tweets.visibility = true AND tweets.own_visibility = true
                      GROUP BY tweets.tweet_id, tweets.user_id, tweets.tweet, tweets.created_at
    
                      UNION ALL
    
                      SELECT 'retweet' AS typ, retweets.retweet_id, retweets.user_id, retweets.retweet_text, retweets.created_at, COUNT(likes.like_id) AS like_count
                      FROM retweets
                      LEFT JOIN likes ON retweets.retweet_id = likes.retweet_id
                      WHERE retweets.deleted_at IS NULL AND retweets.visibility = true AND retweets.own_visibility = true
                      GROUP BY retweets.retweet_id, retweets.user_id, retweets.retweet_text, retweets.created_at
                  ) AS combined";
    
        if ($sort === 'likes') {
            $query .= " ORDER BY like_count DESC";
        }
    
        $tweets = DB::select($query);
    
        // Rest of your code to render the tweets or perform further operations
    
        return view('feed', compact('tweets'));
    }

    public function index1(Request $request)
    {
        $sort = $request->input('sort', 'default');
    
        $query = "SELECT id, user_id, created_at, typ, visibility, deleted_at
        from (
            SELECT tweet_id as id, user_id, created_at, 'tweet' as typ, visibility, own_visibility,  deleted_at
                from tweets 
                where deleted_at is null 
                UNION
                SELECT retweet_id, user_id, created_at, 'retweet' as typ, visibility, own_visibility, deleted_at
                from retweets
        ) as feedTmp
        where deleted_at is null and visibility = 1 and own_visibility = 1";
        

                  
    
        if ($sort === 'time') {
            
            $query .= " ORDER BY created_at DESC";
        }
    
        $tweets = DB::select($query);
    
        // Rest of your code to render the tweets or perform further operations
    
        return view('feed', compact('tweets'));
    }

    public function index2(Request $request)
    {
        $sort = $request->input('sort', 'default');
    
        $query = "SELECT id, user_id ,created_at , typ
                                    FROM (
                                        SELECT 'tweet' AS typ, tweets.tweet_id AS id, tweets.user_id, tweets.tweet, tweets.created_at, COUNT(comments.comment_id) AS comment_count
                                            FROM tweets
                                            LEFT JOIN comments ON tweets.tweet_id = comments.tweet_id
                                             WHERE tweets.deleted_at IS NULL AND tweets.visibility = true AND tweets.own_visibility = true
                                            GROUP BY tweets.tweet_id, tweets.user_id, tweets.tweet, tweets.created_at
            
                                            UNION ALL
            
                                            SELECT 'retweet' AS typ, retweets.retweet_id, retweets.user_id, retweets.retweet_text, retweets.created_at, COUNT(comments.comment_id) AS comment_count
                                            FROM retweets
                                            LEFT JOIN comments ON retweets.retweet_id = comments.retweet_id
                                            WHERE retweets.deleted_at IS NULL AND retweets.visibility = true AND retweets.own_visibility = true
                                             GROUP BY retweets.retweet_id, retweets.user_id, retweets.retweet_text, retweets.created_at
                                        ) AS combined";
        

                  
    
        if ($sort === 'comments') {
            
            $query .= " ORDER BY comment_count DESC";
        }
    
        $tweets = DB::select($query);
    
        // Rest of your code to render the tweets or perform further operations
    
        return view('feed', compact('tweets'));
    }
    
    public function index3(Request $request)
    {
        $sort = $request->input('sort', 'default');
    
        $query = "SELECT id, user_id, created_at , typ
                                    FROM (
                                        SELECT 'tweet' AS typ, tweets.tweet_id AS id, tweets.user_id, tweets.tweet, tweets.created_at, COUNT(retweets.retweet_id) AS retweet_count
                                            FROM tweets
                                            LEFT JOIN retweets ON tweets.tweet_id = retweets.tweet_id
                                            WHERE tweets.deleted_at IS NULL AND tweets.visibility = true AND tweets.own_visibility = true
                                            GROUP BY tweets.tweet_id, tweets.user_id, tweets.tweet, tweets.created_at
            
                                            UNION ALL
            
                                            SELECT 'retweet' AS typ, retweets.retweet_id, retweets.user_id, retweets.retweet_text, retweets.created_at, 0 AS retweet_count
                                            FROM retweets
                                            WHERE retweets.deleted_at IS NULL AND retweets.visibility = true AND retweets.own_visibility = true
                                        ) AS combined
                                    ";
        

                  
    
        if ($sort === 'retweet') {
            
            $query .= " ORDER BY retweet_count DESC";
        }
    
        $tweets = DB::select($query);
    
        // Rest of your code to render the tweets or perform further operations
        return view('feed', compact('tweets'));
    }


    // search function
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search in Tweets
        $tweets = DB::table('tweets')
                    ->where('tweet', 'like', "%$query%")
                    ->get();

        // Search in Retweets
        $retweets = DB::table('retweets')
                      ->where('retweet_text', 'like', "%$query%")
                      ->get();

        // Search in Comments
        $comments = DB::table('comments')
            ->where('comment', 'like', "%$query%")
            ->get();

        // Search in Users
        $users = DB::table('users')
            ->where('username', 'like', "%$query%")
            ->get();

        // Combine the search results
        $combinedResults = $tweets->concat($retweets)->concat($users)->concat($comments);

        // return view('search-results', compact('combinedResults'));
        return view('feed', compact('combinedResults'));
    }

    // search return table 
    public function searchOnFeed(Request $request)
    {
        // query from search bar
        $search = $request->input('query');

        $query = "SELECT id, user_id, created_at, typ
                    FROM (
                        SELECT 'tweet' AS typ, tweets.tweet_id AS id, tweets.user_id, tweets.tweet, tweets.created_at
                        FROM tweets
                        
                        WHERE tweets.tweet LIKE '%" . $search . "%' AND tweets.deleted_at IS NULL AND tweets.visibility = true AND tweets.own_visibility = true
                        GROUP BY tweets.tweet_id, tweets.user_id, tweets.tweet, tweets.created_at

                        UNION ALL

                        SELECT 'retweet' AS typ, retweets.retweet_id AS id, retweets.user_id, retweets.retweet_text, retweets.created_at
                        FROM retweets
                        WHERE retweet_text LIKE '%" . $search . "%' AND retweets.deleted_at IS NULL AND retweets.visibility = true AND retweets.own_visibility = true
                    ) AS combined
                    ORDER BY created_at DESC";

        $tweets = DB::select($query);
       
        if($tweets == NULL){
            $noResults = true;
            return view('feed', compact('noResults'));
        }else{
            $noResults = false;
            return view('feed', compact('tweets'), compact('noResults'));
        }
    }

    public function closeSearch(){
        $noResults = false;
            return view('feed', compact('noResults'));
    }
    
//--------------------------------------------------------------------------------------
}
?>