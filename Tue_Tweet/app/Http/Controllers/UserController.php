<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // UserController: for registration and verification

//--------------------------------------------------------------------------------------
    
    // Route: Verify
    public function getVerify()
    {
        return view('verify');
    }

    // Route: Startscreen
    public function getWelcome()
    {
        return view('welcome');
    }

//--------------------------------------------------------------------------------------

    /* Function: postVerify
    *  input: request with email, username and password
    *  output: mail sent to email with verification code, user routed to code verification
    *
    *  Uses laravel Mail function to send the mail
    *
    *  Preconditions: valid email, unique username, password 4 characters long
    */
    public function postVerify(Request $request){

        // email, username and password validation
        $this->validate($request, [
            'email' => 'required|email|unique:users', 
            'username' => 'required|max:120|unique:users',
            'user_password' => 'required|min:4'
        ]);

        $username_ = $request['username'];
        $email_ = $request['email'];
        // encrypt password
        $user_password_ = bcrypt($request['user_password']);

        // 6-digit random code for verification
        $randomNumber = random_int(100000, 999999);
        
        // array of data to be sent in the email
        $usr_data = array('username' => $username_, 'email' => $email_, 'user_password' => $user_password_, 'randomNumber' => $randomNumber);

        // sending Mail to MailTrap with the verification code
        Mail::send('mail.mailVerify', $usr_data, function($message) use($usr_data) {
            $message->to($usr_data['email'], $usr_data['username'])->subject('Verify Email');
            $message->from('noreply@Tue-Tweet.de','Tue-Tweet');
         });

        return view('verify',compact('usr_data'));
    }
    
    /* Function: postPassChangeVerify
    *  input: request with email
    *  output: mail sent to email with password reset link, user routed to page asking to check mail, if email not valid throws error
    *
    *  Uses laravel Mail function to send the mail
    *  Uses laravel URL function to create a temporary signed link
    *
    *  Preconditions: valid email of an existing account
    */
    public function postPassChangeVerify(Request $request){


        // email of user
        $this->validate($request, [
            'email' => 'required'
        ]);

        // search for the user with the given email
        $usr = User::where('email', $request->email)->first();

        // if the user exists, send the mail with the link, if not throw error
        if ($usr){

            // create the temporary signed link for password reset
            // IMPORTANT! The link is set to expire after 30 seconds for demonstration purposes, it would normally expire after a longer period
            $url = URL::temporarySignedRoute('passChange', now()->addSeconds(30), ['email' => $usr->email]);

            // array of data to be sent in the email
            $usr_data = array('email' => $usr->email, 'username' => $usr->username, 'url' => $url);

            // sending Mail to MailTrap with link
            Mail::send('mail.mailPassword', $usr_data, function($message) use($usr_data) {
                $message->to($usr_data['email'], $usr_data['username'])->subject('Change Password');
                $message->from('noreply@Tue-Tweet.de','Tue-Tweet');
            });

        return view('passChangeVerify');

        } else {
            return redirect()->back()->withErrors(['email' => 'Check if the email is correct.'])->withInput();
            Log::error("Wrong email!");
        }
        
    }

    /* Function: postPassChange
    *  input: request with email, the new password, confirmed password
    *  output: password changed if valid, else throw error
    *
    *  Preconditions: valid email of an existing account
    */
    public function postPassChange(Request $request){

    // new password, confirm the new password and the email of the user
    $this->validate($request, [
        'password' => 'required|max:120|min:4',
        'cpassword' => 'required|max:120|min:4',
        'email' => 'required'
    ]);

    // throw error if password and confirmed password do not match
    if($request->password != $request->cpassword){
        return redirect()->back()->withErrors(['password' => 'Passwords do not match.'])->withInput();
    }

    // throw error if password is too short
    if(Str::length($request->password)<4){
        return redirect()->back()->withErrors(['password' => 'Password is too short.'])->withInput();
    } else {

        // find user using the email
        $usr = User::where('email', $request->email)->first();

        // change the password in the database for given user
        DB::table('users')->where('email', $request->email)->update(['user_password' => bcrypt($request->password)]);

        return redirect()->route('welcome');
    }
}

    /* Function: postSignUp
    *  input: request with email, username and password
    *  output: create new account and log in
    *
    *  Uses laravel Auth function to log in
    *
    *  Preconditions: valid email, unique username and password of at least 4 characters
    */
    public function postSignUp(Request $request)
    {

        // email, username and password Validation
        $this->validate($request, [
            'email' => 'required|email|unique:users', 
            'username' => 'required|max:120|unique:users',
            'user_password' => 'required|min:4'
        ]);

        $email = $request['email'];
        $username = $request['username'];
        $user_password = $request['user_password'];

        // create new User
        $user = new User();

        // fill in the data of the new user
        $user->email = $email;
        $user->username = $username;
        $user->user_password = $user_password;

        // save new user in database
        $user->save();

        $usr = User::where('email', $request->email)->first();

        // Log in with new account
        Auth::login($usr);

        // Store in the session the user type
        Session::put('user_type', 'user');
        Log::info("User $username signed up!");

        return redirect()->route('feed');
    } 

    /* Function: postSignIn
    *  input: request with email and password
    *  output: log in account if correct email and password, else throw error
    *
    *  Uses laravel Auth function to log in
    *
    *  Preconditions: correct email and password of an exsting account
    */
    public function postSignIn(Request $request)
    {
        // email and password Validation
        $this->validate($request, [
            'email' => 'required',
            'user_password' => 'required'
        ]);

        // fnd user using the email
        $user = User::where('email', $request->email)->first();

        // if user exists and the password is correct, continue, else throw error
        if ($user && Hash::check($request->user_password, $user->user_password)) {

            // search for information wether the user is deleted or banned 
            $userID = DB::table('users')->where('email', $request->email)->value('id');
            $userDel = DB::table('users')->where('id', $userID)->value('deleted_at');
            $userAct = DB::table('users')->where('id', $userID)->value('activate');

            // if user is deleted or banned, throw error, else log in
            if ($userDel != null || $userAct == 0) {
                return redirect()->back()->withErrors(['user_password' => 'User is deactivated / deleted'])->withInput();
            }

            // log in
            Auth::login($user);

            // store information about user type
            Session::put('user_type', 'user');
            Log::info("$user->username signed in!");

            return redirect()->route('feed');

        } else {

            // throw error if user does not exist or password is wrong
            return redirect()->back()->withErrors(['user_password' => 'Check if the password or email is correct.'])->withInput();
            Log::error("Wrong email or password!");
        }
    }

//--------------------------------------------------------------------------------------

    
    // Standardhintergrundbild für den User falls er keins hat 
    public function getUserImgHtml($userImg)
    {
        if (is_null($userImg)) {
            $userImgHtml = '<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png">';
        } else {
            $userImgHtml = '<img src=data:image/png;base64,' . $userImg . '>';
        }
        return $userImgHtml;
    }


    public function getUserImg($userImg)
    {
        if (is_null($userImg)) {
            $ret = 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png';
        } else {
            $ret = 'data:image/png;base64,' . $userImg;
        }
        return $ret;
    }

//--------------------------------------------------------------------------------------
    
}
?>