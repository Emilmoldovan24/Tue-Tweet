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



// Verify with UserData
Route::get('verify/{usr_data}', function ($usr_data) {
    return view('verify', ['usr_data' => $usr_data]);
});

// Routes for Password change
Route::get('/passChangeRequest', function () {
    return view('passChangeRequest');
})->name('passChangeRequest');

Route::post('/passChangeVerify', [
    'uses' => 'App\Http\Controllers\UserController@postPassChangeVerify',
    'as' => 'passChangeVerify'
]);

Route::get('passChange/{email}', function ($email) {
    return view('passChange', ['email' => $email]);
})->name('passChange');

Route::post('/passChanged', [
    'uses' => 'App\Http\Controllers\UserController@postPassChange',
    'as' => 'passChanged'
]);
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
])->middleware('superAdmin');

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

// Restore Admin
Route::get('admin-restore/{id}', [AdminController::class, 'restoreAdmin'])->name('admin.restore');

// Deactivate Admin
Route::get('admin-deactivate/{id}', [AdminController::class, 'deactivateAdmin'])->name('admin.deactivate');

// Activate Admin
Route::get('admin-activate/{id}', [AdminController::class, 'activateAdmin'])->name('admin.activate');

// Delete Tweet
Route::get('tweet-delete/{id}', [AdminController::class, 'deleteTweet'])->name('tweet.delete');

//Restore Tweet
Route::get('tweet-restore/{id}', [AdminController::class, 'restoreTweet'])->name('tweet.restore');

//Hide Tweet
Route::get('tweet-hide/{id}', [AdminController::class, 'hideTweet'])->name('tweet.hide');

//Delete Comment
Route::get('comment-delete/{id}', [AdminController::class, 'deleteComment'])->name('comment.delete');

//Restore Comment
Route::get('comment-restore/{id}', [AdminController::class, 'restoreComment'])->name('comment.restore');

//Hide Comment
Route::get('comment-hide/{id}', [AdminController::class, 'hideComment'])->name('comment.hide');

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

// Update Email
Route::post('/postPassword', [
    'uses' => 'App\Http\Controllers\ProfileController@postPassword',
    'as' => 'postPassword'
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

// Hide Tweet Profile 

Route::get('tweet-hide1/{id}', [
    'uses' => 'App\Http\Controllers\ProfileController@hideTweetProfile',
    'as' => 'tweet.hide.profile'
]);

// Edit Comment
Route::post('/Comment-edit', [
    'uses' => 'App\Http\Controllers\ProfileController@ProfileEditComment',
    'as' => 'ProfileEditComment'
]);

// Delete Comment
Route::get('profile-comment-delete/{id}', [
    'uses' => 'App\Http\Controllers\ProfileController@ProfileCommentDelete',
    'as' => 'ProfileCommentDelete'
]);

// Profile Retweet
Route::post('profile-retweet/{tweet_id}', [
    'uses' => 'App\Http\Controllers\ProfileController@profileRetweet',
    'as' => 'profileRetweet'
]);

// safe Information as file
Route::get('/safeFile', [
    'uses' => 'App\Http\Controllers\ProfileController@safeFile',
    'as' => 'safeFile'
]);

// Delete Retweet
Route::get('profile-retweet-delete/{id}', [
    'uses' => 'App\Http\Controllers\ProfileController@MyProfileRetweetDelete',
    'as' => 'MyProfileRetweetDelete'
]);

// Edit Retweet
Route::post('/retweet-profile-edit', [
    'uses' => 'App\Http\Controllers\ProfileController@editProfileRetweet',
    'as' => 'editProfileRetweet'
]);
//---------------------------------------------------------------------------------------------------------------------------

// FeedController

//---------------------Button on the right-------------------------
// Profile
Route::get('/Profile', [
    'uses' => 'App\Http\Controllers\FeedController@getProfile',
    'as' => 'profile'
]);

//Feed
Route::get('/feed', [
    'uses' => 'App\Http\Controllers\FeedController@index',
    'as' => 'feed'
]);

// Feed with tweet id for retweet
Route::get('/feed/{id}', [
    'uses' => 'App\Http\Controllers\FeedController@index',
    'as' => 'feedForRetweet'
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



Route::get('/tweets1', [
    'uses' => 'App\Http\Controllers\FeedController@index1',
    'as' => 'tweets.index1'
]);

Route::get('/tweets2', [
    'uses' => 'App\Http\Controllers\FeedController@index2',
    'as' => 'tweets.index2'
]);

Route::get('/tweets3', [
    'uses' => 'App\Http\Controllers\FeedController@index3',
    'as' => 'tweets.index3'
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

// Post Retweet
Route::post('/postRetweet', [
    'uses' => 'App\Http\Controllers\FeedController@postRetweet',
    'as' => 'postRetweet'
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

// Delete Retweet
Route::get('feed-retweet-delete/{id}', [
    'uses' => 'App\Http\Controllers\FeedController@MyRetweetDelete',
    'as' => 'MyRetweetDelete'
]);

// Edit Retweet
Route::post('/retweet-edit', [
    'uses' => 'App\Http\Controllers\FeedController@editRetweet',
    'as' => 'editRetweet'
]);

//Hide Tweet Feed
Route::get('tweet-hide2/{id}/{typ}', [
    'uses' => 'App\Http\Controllers\FeedController@hideTweetFeed',
    'as' => 'tweet.hide.feed'
]);

// Delete Comment
Route::get('feed-comment-delete/{id}', [
    'uses' => 'App\Http\Controllers\FeedController@MyCommentDelete',
    'as' => 'MyCommentDelete'
]);

// Search
Route::get('/search', [
    'uses' => 'App\Http\Controllers\FeedController@searchOnFeed',
    'as' => 'search'
]);

// close displayed tweets from search
Route::get('/closeSearch', [
    'uses' => 'App\Http\Controllers\FeedController@closeSearch',
    'as' => 'closeSearch'
]);

// ReadMark
Route::post('/mark-as-read', [
    'uses' => 'App\Http\Controllers\FeedController@markAllAsRead',
    'as' => 'mark-as-read'
]);

// show tweet
Route::post('/showTweet/{id}/{typ}', [
    'uses' => 'App\Http\Controllers\FeedController@showTweet',
    'as' => 'showTweet'
]);

// show tweet
Route::get('/showTweet/{id}/{typ}/{notificationId}', [
    'uses' => 'App\Http\Controllers\FeedController@showTweet',
    'as' => 'showTweet'
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
