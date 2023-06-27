<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//---------------------------------------------------------------------------------------------------------------------------

// Routes without an associated button

// Startscreen
Route::get('/', function () {
    return view('welcome');
});

// SignUp
Route::get('/signup', function () {
    return view('signup');
});

// Verify
Route::get('/verify', function () {
    return view('verify');
});

// Settings
Route::get('/settings', function () {
    return view('settings');
});

// Route to understand how to access the database
Route::get('/Test', function () {
    return view('test');
});

// Feed
Route::get('/feed', function () {
    return view('feed');
});

// Verify with UserData
Route::get('verify/{usr_data}', function ($usr_data) {
    return view('verify', ['usr_data' => $usr_data]);
});

//---------------------------------------------------------------------------------------------------------------------------

// UserController

// Startscreen: We need in the signup.blade!
Route::get('/welcome', [
    'uses' => 'App\Http\Controllers\UserController@getwelcome',
    'as' => 'welcome'
]);

// Post SignUp
Route::post('/signup', [
    'uses' => 'App\Http\Controllers\UserController@postSignUp',
    'as' => 'signup'
]);

// Post SignIn
Route::post('/signin', [
    'uses' => 'App\Http\Controllers\UserController@postSignIn',
    'as' => 'signin'
]);

// Post Verify
Route::post('/verify', [
    'uses' => 'App\Http\Controllers\UserController@postVerify',
    'as' => 'postVerify'
]);

//---------------------------------------------------------------------------------------------------------------------------

// AdminController

// AdminLogIn
Route::get('/adminLogin', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminLogIn',
    'as' => 'adminLogin'
]);

// AdminDash
Route::get('/adminDash', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminDash',
    'as' => 'adminDash'
]);

// AdminDash
Route::get('/adminUsers', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminUsers',
    'as' => 'adminUsers'
]);

// AdminCreate
Route::get('/adminCreate', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminCreate',
    'as' => 'adminCreate'
]);

// AdminLogOut
Route::get('/adminLogout', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminLogout',
    'as' => 'adminLogout'
]);

// AdminFeed
Route::get('/adminFeed', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminFeed',
    'as' => 'adminFeed'
]);

// Post AdminCreate
Route::post('/adminCreate', [
    'uses' => 'App\Http\Controllers\AdminController@postCreateAdmin',
    'as' => 'adminCreate'
]);

// Post AdminLogIn
Route::post('/adminLogin', [
    'uses' => 'App\Http\Controllers\AdminController@postAdminLogIn',
    'as' => 'adminLogin'
]);

// Delete Admin
Route::get('admin-delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');

// Delete Tweet
Route::get('tweet-delete/{id}', [AdminController::class, 'deleteTweet'])->name('tweet.delete');

// Hide Tweet
Route::get('tweet-hide/{id}', [AdminController::class, 'hideTweet'])->name('tweet.hide');

// Delete User
Route::get('delete-user/{id}', [AdminController::class, 'deleteUser'])->name('tweet.deleteUser');

// Restore User
Route::get('restore-user/{id}', [AdminController::class, 'restoreUser'])->name('tweet.restoreUser');

// Safe single User info
Route::get('safeUserInfo/{id}', [AdminController::class, 'safeUserInfo'])->name('tweet.safeUserInfo');

//---------------------------------------------------------------------------------------------------------------------------

// ProfileController

// Update Image
Route::post('/postImage', [
    'uses' => 'App\Http\Controllers\ProfileController@postImage',
    'as' => 'postImage'
]);

// Update Bio
Route::post('/postBio', [
    'uses' => 'App\Http\Controllers\ProfileController@postBio',
    'as' => 'postBio'
]);

// Update Username
Route::post('/postUsername', [
    'uses' => 'App\Http\Controllers\ProfileController@postUsername',
    'as' => 'postUsername'
]);

// Update Email
Route::post('/postEmail', [
    'uses' => 'App\Http\Controllers\ProfileController@postEmail',
    'as' => 'postEmail'
]);

// Follow/Unfollow
Route::post('/follow', [
    'uses' => 'App\Http\Controllers\ProfileController@postFollow',
    'as' => 'follow'
]);

// Edit Tweet
Route::post('/profileTweet-edit', [
    'uses' => 'App\Http\Controllers\ProfileController@editProfileTweet',
    'as' => 'editProfileTweet'
]);

// Delete Tweet
Route::get('profile-tweet-delete/{id}', [
    'uses' => 'App\Http\Controllers\ProfileController@ProfileTweetDelete',
    'as' => 'ProfileTweetDelete'
]);

// safe Information as file
Route::get('/safeFile', [
    'uses' => 'App\Http\Controllers\ProfileController@safeFile',
    'as' => 'safeFile'
]);

//---------------------------------------------------------------------------------------------------------------------------

// FeedController

//---------------------Button on the right-------------------------
// Profile
Route::get('/Profile', [
    'uses' => 'App\Http\Controllers\FeedController@getProfile',
    'as' => 'profile'
]);

// Feed
Route::get('/feed', [
    'uses' => 'App\Http\Controllers\FeedController@getFeed',
    'as' => 'feed'
]);

// LogOut
Route::get('/logout', [
    'uses' => 'App\Http\Controllers\FeedController@getLogout',
    'as' => 'logout'
]);

// Settings
Route::get('/settings', [
    'uses' => 'App\Http\Controllers\FeedController@getsettings',
    'as' => 'settings'
]);

//-----------------------------------------------------------------

// Post Tweet
Route::post('/postTweet', [
    'uses' => 'App\Http\Controllers\FeedController@postTweet',
    'as' => 'postTweet'
]);

// Post Retweet
Route::post('/retweet', [
    'uses' => 'App\Http\Controllers\FeedController@postRetweet',
    'as' => 'retweet'
]);

// unfinish: Create Retweet
Route::post('/createRetweet', [
    'uses' => 'App\Http\Controllers\FeedController@createRetweet',
    'as' => 'createRetweet'
]);

// Post Comment
Route::post('/postComment', [
    'uses' => 'App\Http\Controllers\FeedController@postComment',
    'as' => 'postComment'
]);

// Like/Unlike
Route::post('/like', [
    'uses' => 'App\Http\Controllers\FeedController@postLike',
    'as' => 'like'
]);

// Edit Tweet
Route::post('/tweet-edit', [
    'uses' => 'App\Http\Controllers\FeedController@editTweet',
    'as' => 'editTweet'
]);

// Edit Comment
Route::post('/comment-edit', [
    'uses' => 'App\Http\Controllers\FeedController@editComment',
    'as' => 'editComment'
]);

// Delete Tweet
Route::get('feed-tweet-delete/{id}', [
    'uses' => 'App\Http\Controllers\FeedController@MyTweetDelete',
    'as' => 'MyTweetDelete'
]);

// Delete Comment
Route::get('feed-comment-delete/{id}', [
    'uses' => 'App\Http\Controllers\FeedController@MyCommentDelete',
    'as' => 'MyCommentDelete'
]);

//---------------------------------------------------------------------------------------------------------------------------

// NOTE: this route must be at the very back, otherwise it will throw errors

// Profile with your RouteName
Route::get('/{username}', function ($username) {
    // Überprüfe, ob der Benutzername existiert
    $user = User::where('username', $username)->first();

    if ($user) {
        return view('profile', ['username' => $user->username]);
    } else {
        // Benutzername existiert nicht, zeige eine entsprechende Fehlermeldung oder leite auf eine andere Seite weiter
        abort(404);
    }
});

//---------------------------------------------------------------------------------------------------------------------------
