<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', [
    'uses' => 'App\Http\Controllers\UserController@getwelcome',
    'as' => 'welcome'
]);


Route::get('/landing', function () {
    return view('landing');
});

Route::get('/uiplay', function () {
    return view('uiplay');
});

Route::get('/home', function () {
    return view('testhomefeed');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/settings', function() {
    return view('settings');
});

Route::get('/Test', function () {
    return view('test');
});


Route::get('/Profile', [
    'uses' => 'App\Http\Controllers\FeedController@getProfile',
    'as' => 'profile'
]);

Route::get('/feed', function () {
    return view('feed');
});

Route::get('/adminLogin', [
    'uses' => 'App\Http\Controllers\AdminController@getAdminLogIn',
    'as' => 'adminLogin'
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

Route::get('/feed', [
    'uses' => 'App\Http\Controllers\UserController@getFeed',
    'as' => 'feed'
]);

Route::post('/postTweet', [
    'uses' => 'App\Http\Controllers\UserController@postTweet',
    'as' => 'postTweet'
]);

Route::post('/signup', [
    'uses' => 'App\Http\Controllers\UserController@postSignUp',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'App\Http\Controllers\UserController@postSignIn',
    'as' => 'signin'
]);

Route::post('/postImage', [
    'uses' => 'App\Http\Controllers\UserController@postImage',
    'as' => 'postImage'
]);

Route::post('/postBio', [
    'uses' => 'App\Http\Controllers\UserController@postBio',
    'as' => 'postBio'
]);

Route::post('/postUsername', [
    'uses' => 'App\Http\Controllers\UserController@postUsername',
    'as' => 'postUsername'
]);

Route::post('/postEmail', [
    'uses' => 'App\Http\Controllers\UserController@postEmail',
    'as' => 'postEmail'
]);

Route::post('/retweet', [
    'uses' => 'App\Http\Controllers\UserController@postRetweet',
    'as' => 'retweet'
]);

Route::post('/createRetweet', [
    'uses' => 'App\Http\Controllers\UserController@createRetweet',
    'as' => 'createRetweet'
]);

Route::post('/postComment', [
    'uses' => 'App\Http\Controllers\UserController@postComment',
    'as' => 'postComment'
]);

Route::post('/like', [
    'uses' => 'App\Http\Controllers\UserController@postLike',
    'as' => 'like'
]);

Route::get('/logout', [
    'uses' => 'App\Http\Controllers\UserController@getLogout',
    'as' => 'logout'
]);

Route::get('/{username}', [
    'uses' => 'App\Http\Controllers\ProfileController@getProfile',
    'as' => 'userProfile'
]);

Route::get('profile/{username}', function($username){
    return view('profile', ['username' => $username]);
});

#Test-side
Route::get('/settings', [
    'uses' => 'App\Http\Controllers\UserController@getsettings',
    'as' => 'settings'
]);
