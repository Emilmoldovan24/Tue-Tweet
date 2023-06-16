<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

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
Route::get('/settings', function() {
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

// Profile with your RouteName
Route::get('/{username}', function($username){
    return view('profile', ['username' => $username]);
});

// Verify with UserData
Route::get('verify/{usr_data}', function($usr_data){
    return view('verify', ['usr_data' => $usr_data]);
});

//---------------------------------------------------------------------------------------------------------------------------

// UserController

/* // Startscreen
Route::get('/welcome', [
    'uses' => 'App\Http\Controllers\UserController@getwelcome',
    'as' => 'welcome'
]); */

// SignUp
Route::post('/signup', [
    'uses' => 'App\Http\Controllers\UserController@postSignUp',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'App\Http\Controllers\UserController@postSignIn',
    'as' => 'signin'
]);

Route::post('/verify', [
    'uses' => 'App\Http\Controllers\UserController@postVerify',
    'as' => 'postVerify'
]);

//---------------------------------------------------------------------------------------------------------------------------

Route::get('/Profile', [
    'uses' => 'App\Http\Controllers\FeedController@getProfile',
    'as' => 'profile'
]);



Route::get('/adminLogin', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminLogIn',
    'as' => 'adminLogin'
]);

Route::get('/adminLogout', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminLogout',
    'as' => 'adminLogout'
]);

Route::get('/adminFeed', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminFeed',
    'as' => 'adminFeed'
]);

Route::post('/adminSingup', [
    'uses' => 'App\Http\Controllers\AdminController@postAdminSignUp',
    'as' => 'adminSingup'
]);

Route::post('/adminLogin', [
    'uses' => 'App\Http\Controllers\AdminController@postAdminLogIn',
    'as' => 'adminLogin'
]);



Route::get('tweet-delete/{id}', [AdminController::class, 'deleteTweet'])->name('tweet.delete');

Route::get('tweet-hide/{id}', [AdminController::class, 'hideTweet'])->name('tweet.hide');

Route::get('delete-user/{id}', [AdminController::class, 'deleteUser'])->name('tweet.deleteUser');

Route::get('restore-user/{id}', [AdminController::class, 'restoreUser'])->name('tweet.restoreUser');

Route::get('/feed', [
    'uses' => 'App\Http\Controllers\FeedController@getFeed',
    'as' => 'feed'
]);

Route::post('/postTweet', [
    'uses' => 'App\Http\Controllers\FeedController@postTweet',
    'as' => 'postTweet'
]);


Route::post('/postImage', [
    'uses' => 'App\Http\Controllers\ProfileController@postImage',
    'as' => 'postImage'
]);

Route::post('/postBio', [
    'uses' => 'App\Http\Controllers\ProfileController@postBio',
    'as' => 'postBio'
]);

Route::post('/postUsername', [
    'uses' => 'App\Http\Controllers\ProfileController@postUsername',
    'as' => 'postUsername'
]);

Route::post('/postEmail', [
    'uses' => 'App\Http\Controllers\ProfileController@postEmail',
    'as' => 'postEmail'
]);

Route::post('/retweet', [
    'uses' => 'App\Http\Controllers\FeedController@postRetweet',
    'as' => 'retweet'
]);

Route::post('/createRetweet', [
    'uses' => 'App\Http\Controllers\FeedController@createRetweet',
    'as' => 'createRetweet'
]);

Route::post('/postComment', [
    'uses' => 'App\Http\Controllers\FeedController@postComment',
    'as' => 'postComment'
]);

Route::post('/like', [
    'uses' => 'App\Http\Controllers\FeedController@postLike',
    'as' => 'like'
]);

Route::post('/follow', [
    'uses' => 'App\Http\Controllers\ProfileController@postFollow',
    'as' => 'follow'
]);

Route::get('/logout', [
    'uses' => 'App\Http\Controllers\FeedController@getLogout',
    'as' => 'logout'
]);



Route::get('/settings', [
    'uses' => 'App\Http\Controllers\FeedController@getsettings',
    'as' => 'settings'
]);



