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
})->middleware('notLoggedIn');

// Verify
Route::get('/verify', function () {
    return view('verify');
})->middleware('notLoggedIn');

// Settings
Route::get('/settings', function () {
    return view('settings');
});

// Route to understand how to access the database
Route::get('/Test', function () {
    return view('test');
});


//---------------------------------------------------------------------------------------------------------------------------

// Route for email verification 
Route::get('verify/{usr_data}', function ($usr_data) {
    return view('verify', ['usr_data' => $usr_data]);
})->middleware('notLoggedIn');

// Routes for Password change
Route::get('/passChangeRequest', function () {
    return view('passChangeRequest');
})->name('passChangeRequest')->middleware('notLoggedIn');

Route::post('/passChangeVerify', [
    'uses' => 'App\Http\Controllers\UserController@postPassChangeVerify',
    'as' => 'passChangeVerify'
])->middleware('notLoggedIn');

Route::get('passChange/{email}', function ($email) {
    return view('passChange', ['email' => $email]);
})->name('passChange')->middleware('expiredLink');

Route::post('/passChanged', [
    'uses' => 'App\Http\Controllers\UserController@postPassChange',
    'as' => 'passChanged'
])->middleware('notLoggedIn');

//---------------------------------------------------------------------------------------------------------------------------

// UserController

// Startscreen: We need in the signup.blade!
Route::get('/welcome', [
    'uses' => 'App\Http\Controllers\UserController@getWelcome',
    'as' => 'welcome'
])->middleware('notLoggedIn');

// Post SignUp
Route::post('/signup', [
    'uses' => 'App\Http\Controllers\UserController@postSignUp',
    'as' => 'signup'
])->middleware('notLoggedIn');

// Post SignIn
Route::post('/signin', [
    'uses' => 'App\Http\Controllers\UserController@postSignIn',
    'as' => 'signin'
])->middleware('notLoggedIn');

// Post Verify
Route::post('/verify', [
    'uses' => 'App\Http\Controllers\UserController@postVerify',
    'as' => 'postVerify'
])->middleware('notLoggedIn');

//---------------------------------------------------------------------------------------------------------------------------

// AdminController

// AdminLogIn
Route::get('/adminLogin', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminLogIn',
    'as' => 'adminLogin'
])->middleware('notLoggedIn');

// AdminDash
Route::get('/adminDash', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminDash',
    'as' => 'adminDash'
])->middleware('isAdmin');

// AdminDash
Route::get('/adminUsers', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminUsers',
    'as' => 'adminUsers'
])->middleware('isAdmin');

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
])->middleware('isAdmin');

// Post AdminCreate
Route::post('/adminCreate', [
    'uses' => 'App\Http\Controllers\AdminController@postCreateAdmin',
    'as' => 'adminCreate'
])->middleware('superAdmin');

// Post AdminLogIn
Route::post('/adminLogin', [
    'uses' => 'App\Http\Controllers\AdminController@postAdminLogIn',
    'as' => 'adminLogin'
]);

// Delete Admin
Route::get('admin-delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete')->middleware('superAdmin');

// Restore Admin
Route::get('admin-restore/{id}', [AdminController::class, 'restoreAdmin'])->name('admin.restore')->middleware('superAdmin');

// Deactivate Admin
Route::get('admin-deactivate/{id}', [AdminController::class, 'deactivateAdmin'])->name('admin.deactivate')->middleware('superAdmin');

// Activate Admin
Route::get('admin-activate/{id}', [AdminController::class, 'activateAdmin'])->name('admin.activate')->middleware('superAdmin');

// Delete Tweet
Route::get('tweet-delete/{id}', [AdminController::class, 'deleteTweet'])->name('tweet.delete')->middleware('isAdmin');

//Restore Tweet
Route::get('tweet-restore/{id}', [AdminController::class, 'restoreTweet'])->name('tweet.restore')->middleware('isAdmin');

//Hide Tweet
Route::get('tweet-hide/{id}', [AdminController::class, 'hideTweet'])->name('tweet.hide')->middleware('isAdmin');

// Delete ReTweet
Route::get('retweet-delete/{id}', [AdminController::class, 'deleteRetweet'])->name('retweet.delete')->middleware('isAdmin');

//Restore ReTweet
Route::get('retweet-restore/{id}', [AdminController::class, 'restoreRetweet'])->name('retweet.restore')->middleware('isAdmin');

//Hide ReTweet
Route::get('retweet-hide/{id}', [AdminController::class, 'hideRetweet'])->name('retweet.hide')->middleware('isAdmin');

//Delete Comment
Route::get('comment-delete/{id}', [AdminController::class, 'deleteComment'])->name('comment.delete')->middleware('isAdmin');

//Restore Comment
Route::get('comment-restore/{id}', [AdminController::class, 'restoreComment'])->name('comment.restore')->middleware('isAdmin');

//Hide Comment
Route::get('comment-hide/{id}', [AdminController::class, 'hideComment'])->name('comment.hide')->middleware('isAdmin');

// Delete User
Route::get('delete-user/{id}', [AdminController::class, 'deleteUser'])->name('tweet.deleteUser')->middleware('isAdmin');

// Restore User
Route::get('restore-user/{id}', [AdminController::class, 'restoreUser'])->name('tweet.restoreUser')->middleware('isAdmin');

// Safe single User info
Route::get('safeUserInfo/{id}', [AdminController::class, 'safeUserInfo'])->name('tweet.safeUserInfo')->middleware('isAdmin');

//password change mail
Route::post('/adminPassChangeVerify', [
    'uses' => 'App\Http\Controllers\AdminController@postPassChangeVerify',
    'as' => 'adminPassChangeVerify'
])->middleware('isAdmin');


//---------------------------------------------------------------------------------------------------------------------------

// ProfileController

// Update Image
Route::post('/postImage', [
    'uses' => 'App\Http\Controllers\ProfileController@postImage',
    'as' => 'postImage'
])->middleware('loggedIn');

// Update Bio
Route::post('/postBio', [
    'uses' => 'App\Http\Controllers\ProfileController@postBio',
    'as' => 'postBio'
])->middleware('loggedIn');

// Update Username
Route::post('/postUsername', [
    'uses' => 'App\Http\Controllers\ProfileController@postUsername',
    'as' => 'postUsername'
])->middleware('loggedIn');

// Update Email
Route::post('/postEmail', [
    'uses' => 'App\Http\Controllers\ProfileController@postEmail',
    'as' => 'postEmail'
])->middleware('loggedIn');

// Update Email
Route::post('/postPassword', [
    'uses' => 'App\Http\Controllers\ProfileController@postPassword',
    'as' => 'postPassword'
])->middleware('loggedIn');

// Follow/Unfollow
Route::post('/follow', [
    'uses' => 'App\Http\Controllers\ProfileController@postFollow',
    'as' => 'follow'
])->middleware('loggedIn');

// Edit Tweet
Route::post('/profileTweet-edit', [
    'uses' => 'App\Http\Controllers\ProfileController@editTweetProfile',
    'as' => 'editTweetProfile'
])->middleware('loggedIn');

// Delete Tweet
Route::get('profile-tweet-delete/{id}', [
    'uses' => 'App\Http\Controllers\ProfileController@deleteTweetProfile',
    'as' => 'deleteTweetProfile'
])->middleware('loggedIn');

// Hide Tweet Profile 

Route::get('tweet-hide1/{id}', [
    'uses' => 'App\Http\Controllers\ProfileController@hideTweetProfile',
    'as' => 'tweet.hide.profile'
])->middleware('loggedIn');

// Edit Comment
Route::post('/Comment-edit', [
    'uses' => 'App\Http\Controllers\ProfileController@editCommentProfile',
    'as' => 'editCommentProfile'
])->middleware('loggedIn');

// Delete Comment
Route::get('profile-comment-delete/{id}', [
    'uses' => 'App\Http\Controllers\ProfileController@deleteCommentProfile',
    'as' => 'deleteCommentProfile'
])->middleware('loggedIn');

// Profile Retweet
Route::post('profile-retweet/{tweet_id}', [
    'uses' => 'App\Http\Controllers\ProfileController@retweetProfile',
    'as' => 'retweetProfile'
])->middleware('loggedIn');

// safe Information as file
Route::get('/safeFile', [
    'uses' => 'App\Http\Controllers\ProfileController@safeFile',
    'as' => 'safeFile'
])->middleware('loggedIn');

// Delete Retweet
Route::get('profile-retweet-delete/{id}', [
    'uses' => 'App\Http\Controllers\ProfileController@deleteRetweetProfile',
    'as' => 'deleteRetweetProfile'
])->middleware('loggedIn');

// Edit Retweet
Route::post('/retweet-profile-edit', [
    'uses' => 'App\Http\Controllers\ProfileController@editRetweetProfile',
    'as' => 'editRetweetProfile'
])->middleware('loggedIn');
//---------------------------------------------------------------------------------------------------------------------------

// FeedController

//---------------------Button on the right-------------------------
// Profile
Route::get('/Profile', [
    'uses' => 'App\Http\Controllers\FeedController@getProfile',
    'as' => 'profile'
])->middleware('loggedIn');

//Feed
Route::get('/feed', [
    'uses' => 'App\Http\Controllers\FeedController@sortByLike',
    'as' => 'feed'
])->middleware('loggedIn');

// Feed with tweet id for retweet
Route::get('/feed/{id}', [
    'uses' => 'App\Http\Controllers\FeedController@sortByLike',
    'as' => 'feedForRetweet'
])->middleware('loggedIn');

// LogOut
Route::get('/logout', [
    'uses' => 'App\Http\Controllers\FeedController@getLogout',
    'as' => 'logout'
])->middleware('loggedIn');

// Settings
Route::get('/settings', [
    'uses' => 'App\Http\Controllers\FeedController@getsettings',
    'as' => 'settings'
])->middleware('loggedIn');



Route::get('/tweets1', [
    'uses' => 'App\Http\Controllers\FeedController@sortByTime',
    'as' => 'tweets.sortByTime'
])->middleware('loggedIn');

Route::get('/tweets2', [
    'uses' => 'App\Http\Controllers\FeedController@sortByComments',
    'as' => 'tweets.sortByComments'
])->middleware('loggedIn');

Route::get('/tweets3', [
    'uses' => 'App\Http\Controllers\FeedController@sortByRetweet',
    'as' => 'tweets.sortByRetweet'
])->middleware('loggedIn');

//-----------------------------------------------------------------

// Post Tweet
Route::post('/postTweet', [
    'uses' => 'App\Http\Controllers\FeedController@postTweet',
    'as' => 'postTweet'
])->middleware('loggedIn');

// Post Retweet
Route::post('/retweet', [
    'uses' => 'App\Http\Controllers\FeedController@postRetweet',
    'as' => 'retweet'
])->middleware('loggedIn');

// Post Retweet
Route::post('/postRetweet', [
    'uses' => 'App\Http\Controllers\FeedController@postRetweet',
    'as' => 'postRetweet'
])->middleware('loggedIn');

// Post Comment
Route::post('/postComment', [
    'uses' => 'App\Http\Controllers\FeedController@postComment',
    'as' => 'postComment'
])->middleware('loggedIn');

// Like/Unlike
Route::post('/like', [
    'uses' => 'App\Http\Controllers\FeedController@postLike',
    'as' => 'like'
])->middleware('loggedIn');

// Edit Tweet
Route::post('/tweet-edit', [
    'uses' => 'App\Http\Controllers\FeedController@editTweet',
    'as' => 'editTweet'
])->middleware('loggedIn');

// Edit Comment
Route::post('/comment-edit', [
    'uses' => 'App\Http\Controllers\FeedController@editComment',
    'as' => 'editComment'
])->middleware('loggedIn');

// Delete Tweet
Route::get('feed-tweet-delete/{id}', [
    'uses' => 'App\Http\Controllers\FeedController@MyTweetDelete',
    'as' => 'MyTweetDelete'
])->middleware('loggedIn');

// Delete Retweet
Route::get('feed-retweet-delete/{id}', [
    'uses' => 'App\Http\Controllers\FeedController@MyRetweetDelete',
    'as' => 'MyRetweetDelete'
])->middleware('loggedIn');

// Edit Retweet
Route::post('/retweet-edit', [
    'uses' => 'App\Http\Controllers\FeedController@editRetweet',
    'as' => 'editRetweet'
])->middleware('loggedIn');

//Hide Tweet Feed
Route::get('tweet-hide2/{id}/{typ}', [
    'uses' => 'App\Http\Controllers\FeedController@hideTweetFeed',
    'as' => 'tweet.hide.feed'
])->middleware('loggedIn');

// Delete Comment
Route::get('feed-comment-delete/{id}', [
    'uses' => 'App\Http\Controllers\FeedController@MyCommentDelete',
    'as' => 'MyCommentDelete'
])->middleware('loggedIn');

// Search
Route::get('/search', [
    'uses' => 'App\Http\Controllers\FeedController@searchOnFeed',
    'as' => 'search'
])->middleware('loggedIn');

// close displayed tweets from search
Route::get('/closeSearch', [
    'uses' => 'App\Http\Controllers\FeedController@closeSearch',
    'as' => 'closeSearch'
])->middleware('loggedIn');

// ReadMark
Route::post('/mark-as-read', [
    'uses' => 'App\Http\Controllers\FeedController@markAllAsRead',
    'as' => 'mark-as-read'
])->middleware('loggedIn');

// show tweet
Route::get('/showTweet/{id}/{typ}/{notificationId}', [
    'uses' => 'App\Http\Controllers\FeedController@showTweet',
    'as' => 'showTweet'
])->middleware('loggedIn');


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
})->middleware('loggedIn');

//---------------------------------------------------------------------------------------------------------------------------
