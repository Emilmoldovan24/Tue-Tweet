<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    // Function: Post Verify
    public function postVerify(Request $request){

        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

        // email, username and password Validation
        $this->validate($request, [
            'email' => 'required|email|unique:users', 
            'username' => 'required|max:120|unique:users',
            'user_password' => 'required|min:4'
        ]);

        $username_ = $request['username'];
        $email_ = $request['email'];
        $user_password_ = bcrypt($request['user_password']);

        // 6-digit code for verification
        $randomNumber = random_int(100000, 999999);

        $usr_data = array('username' => $username_, 'email' => $email_, 'user_password' => $user_password_, 'randomNumber' => $randomNumber);

        // sending Mail to MailTrap
        Mail::send('mail.mailVerify', $usr_data, function($message) use($usr_data) {
            $message->to($usr_data['email'], $usr_data['username'])->subject('Verify Email');
            $message->from('noreply@Tue-Tweet.de','Tue-Tweet');
         });

        return view('verify',compact('usr_data'));
    }
    
    // Function: Password change request
    public function postPassChangeVerify(Request $request){


        // email of user
        $this->validate($request, [
            'email' => 'required'
        ]);
        $usr = User::where('email', $request->email)->first();
        if ($usr){
            $usr_data = array('email' => $usr->email, 'username' => $usr->username);

            // sending Mail to MailTrap
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

    // Function: Password change
    public function postPassChange(Request $request){

    // password to be changed
    $this->validate($request, [
        'password' => 'required|max:120|min:4',
        'cpassword' => 'required|max:120|min:4',
        'email' => 'required'
    ]);
    if($request->password != $request->cpassword){
        return redirect()->back()->withErrors(['password' => 'Passwords do not match.'])->withInput();
    }
    if(Str::length($request->password)<4){
        return redirect()->back()->withErrors(['password' => 'Password is too short.'])->withInput();
    } else {
        // change password of user
        $usr = User::where('email', $request->email)->first();
        Log::info("User $usr->username changed password!");

        $user_password =  $request->password;
        DB::table('users')->where('email', $request->email)->update(['user_password' => bcrypt($user_password)]);

        return redirect()->route('welcome');
    }
}

    // Function: SignUp
    public function postSignUp(Request $request)
    {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimeString);

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
        $user->email = $email;
        $user->username = $username;
        $user->user_password = $user_password;

        $user->save();

        // Auth logIn
        $usr = User::where('email', $request->email)->first();
        Auth::login($usr);
        Log::info("User $username signed up!");

        return redirect()->route('feed');
    } 

    // Function: SignIn
    public function postSignIn(Request $request)
    {
        // empty email and password Validation
        $this->validate($request, [
            'email' => 'required',
            'user_password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->user_password, $user->user_password)) {
            // User found and right password
            Auth::login($user);
            Log::info("$user->username signed in!");
            return redirect()->route('feed');
        } else {
            // User not found or wrong password 
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