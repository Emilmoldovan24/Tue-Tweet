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
    public function getAdminLogIn()
    {
        return view('adminLogIn');
    }
    public function getAdminCreate()
    {
        return view('adminCreate');
    }
    public function getAdminDash()
    {
        return view('adminDashboard');
    }
    public function getAdminUsers()
    {
        return view('adminUserFeed');
    }
    public function getAdminFeed()
    {
        return view('adminFeed');
    }
    public function getAdminLogout()
    {
        Auth::logout();
        return redirect()->route('adminLogin');
    }

    public function postCreateAdmin(Request $request)
    {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        //validation
        $this->validate($request, [
            'email' => 'required|email|unique:admins',
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

    public function postAdminLogIn(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'user_password' => ['required'],
        ]);

        $admin = Admin::where('email', $request->email)->first();



        if (Auth::guard('admin') && Hash::check($request->user_password, $admin->user_password)) {



            // Admin gefunden und Passwort ist korrekt
            $adminID = DB::table('admins')->where('email', $request->email)->value('id');
            $adminDel = DB::table('admins')->where('id', $adminID)->value('deleted_at');
            $adminAct = DB::table('admins')->where('id', $adminID)->value('activated');
            //check if admin is deleted / deactivated
            if ($adminDel != null || $adminAct == 0) {
                return redirect()->back()->withErrors(['admin_password' => 'Admin is deactivated / deleted'])->withInput();
            }
            Auth::login($admin);
            return redirect()->route('adminDash');
        } else {
            // Admin nicht gefunden oder Passwort ist falsch
            return redirect()->back()->withErrors(['admin_password' => 'Check if the password or email is correct.'])->withInput();
        }
    }

    public function deleteTweet(Request $request)
    {

        $id = $request->id;

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        DB::update("update tweets set deleted_at = '$currentTimestamp' where tweet_id = '$id'");

        DB::update("update tweets set visibility = 0 where tweet_id = '$id'");

        return redirect()->back();
    }

    public function restoreTweet(Request $request)
    {

        $id = $request->id;
        DB::update("update tweets set deleted_at = null where tweet_id = ?", [$id]);
        DB::update("update tweets set visibility = 1 where tweet_id = ?", [$id]);

        return redirect()->back();
    }

    public function deleteAdmin(Request $request)
    {

        $id = $request->id;

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        DB::update("update admins set deleted_at = '$currentTimestamp' where id = ?", [$id]);
        DB::update("update admins set activated = 0 where id = ?", [$id]);

        return redirect()->back();
    }

    public function restoreAdmin(Request $request)
    {

        $id = $request->id;

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        DB::update("update admins set deleted_at = null where id = ?", [$id]);
        DB::update("update admins set activated = 1 where id = ?", [$id]);

        return redirect()->back();
    }

    public function activateAdmin(Request $request)
    {

        $id = $request->id;

        DB::update("update admins set activated = 1 where id = ?", [$id]);

        return redirect()->back();
    }

    public function deactivateAdmin(Request $request)
    {

        $id = $request->id;

        DB::update("update admins set activated = 0 where id = ?", [$id]);

        return redirect()->back();
    }

    public function hideTweet(Request $request)
    {

        $id = $request->id;
        $userId = DB::table('tweets')->where('tweet_id', $id)->value('user_id');
        $userDeletedAt = DB::table('users')->where('id', $userId)->value('deleted_at');
        $userExists = 0;
        if ($userDeletedAt == NULL) {
            $userExists = 1;
        }

        $tweet = DB::select("select * from tweets where tweet_id =?", [$id]);
        $tweetVis = DB::table('tweets')->where('tweet_id', $id)->value('visibility');

        if ($tweetVis == 0) {
            DB::update("update tweets set visibility = 1 where tweet_id = ?", [$id]);
        } else {
            DB::update("update tweets set visibility = 0 where tweet_id = ?", [$id]);
        }

        return redirect()->back();
    }

    public function deleteComment(Request $request)
    {
        $id = $request->id;

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        DB::update("update comments set deleted_at = '$currentTimestamp' where comment_id = ?", [$id]);

        DB::update("update comments set visibility = 0 where comment_id = ?", [$id]);

        return redirect()->back();
    }

    public function restoreComment(Request $request)
    {
        $id = $request->id;

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        DB::update("update comments set deleted_at = null where comment_id = ?", [$id]);
        DB::update("update comments set visibility = 1 where comment_id = ?", [$id]);

        return redirect()->back();
    }

    public function hideComment(Request $request)
    {

        $id = $request->id;

        $commentVis = DB::table('comments')->where('comment_id', $id)->value('visibility');

        if ($commentVis == 0) {
            DB::update("update comments set visibility = 1 where comment_id = ?", [$id]);
        } else {
            DB::update("update comments set visibility = 0 where comment_id = ?", [$id]);
        }


        return redirect()->back();
    }



    public function deleteUser(Request $request)
    {

        $id = $request->id;

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        DB::update("update users set deleted_at = '$currentTimestamp' where id = ?", [$id]);

        DB::update("update tweets set visibility = 0 where user_id = ?", [$id]);

        return redirect()->back();
    }

    public function restoreUser(Request $request)
    {

        $id = $request->id;
        // $userId = DB::table('tweets')->where('tweet_id', $id)->value('user_id');
        DB::update("update users set deleted_at =  null where id = ?", [$id]);
        DB::update("update tweets set visibility = 1 where user_id = ?", [$id]);

        return redirect()->back();
    }

    public function safeUserInfo(Request $request)
    {
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
        $likes = DB::table('likes')->where('user_id', $id)->get();
        $follows = DB::table('follows')->select('follows.*', 'users.username')->join('users', 'follows.follow_user_id', '=', 'users.id')->where('follows.following_user_id', $id)->get();
        $followings = DB::table('follows')->join('users', 'follows.following_user_id', '=', 'users.id')->where('follows.follow_user_id', $id)->select('users.username', 'follows.created_at')->get();
        $tweetPics = DB::table('tweets')->where('user_id', $id)->where('img', '<>', NULL)->get();


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
        //safe file in path\to\Tue-Tweet\Tue_Tweet\storage\app
        Storage::put($filename, $contents);

        $filePath = storage_path('app\\' . $filename);
        $fileSize = filesize($filePath);

        if (file_exists($filePath)) {

            $headers = [
                'Content-Type' => 'text/plain',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                'Content-Length' => $fileSize,
            ];
            return response()->download($filePath, $filename, $headers);
        } else {
            return redirect()->route('settings');
        }

        return redirect()->back();
    }
}
