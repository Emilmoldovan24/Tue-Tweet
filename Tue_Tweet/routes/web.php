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

Route::get('/Test', function() {
    return view('test');
});


Route::get('/Profile', [
    'uses' => 'App\Http\Controllers\FeedController@getProfile',
    'as' => 'profile'
]);

Route::get('/feed', function() {
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
    'as' => 'adminSingup']);

Route::post('/adminLogin', [
    'uses' => 'App\Http\Controllers\AdminController@postAdminLogIn',
    'as' => 'adminLogin']);

Route::get('tweet-delete/{id}',[AdminController::class,'deleteTweet'])->name('tweet.delete');

Route::get('/feed', [
    'uses' => 'App\Http\Controllers\UserController@getFeed',
    'as' => 'feed'
]);

Route::post('/postTweet', [
    'uses' => 'App\Http\Controllers\UserController@postTweet',
    'as' => 'postTweet']);

Route::post('/signup', [
    'uses' => 'App\Http\Controllers\UserController@postSignUp',
    'as' => 'signup']);
    
Route::post('/signin', [
    'uses' => 'App\Http\Controllers\UserController@postSignIn',
    'as' => 'signin']);

Route::post('/retweet', [
    'uses' => 'App\Http\Controllers\UserController@postRetweet',
    'as' => 'retweet']);

Route::post('/createRetweet', [
    'uses' => 'App\Http\Controllers\UserController@postCreateRetweet',
    'as' => 'createRetweet']);

Route::post('/comment', [
    'uses' => 'App\Http\Controllers\UserController@postComment',
    'as' => 'comment']);

Route::post('/like', [
    'uses' => 'App\Http\Controllers\UserController@postLike',
    'as' => 'like']);

Route::get('/logout', [
    'uses' => 'App\Http\Controllers\UserController@getLogout',
    'as' => 'logout']);


#Test-side
Route::get('/dashboard', [
    'uses' => 'App\Http\Controllers\UserController@getDashboard',
    'as' => 'dashboard'
]);

