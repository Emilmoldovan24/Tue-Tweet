<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function getDashboard(){
        return view('dashboard');
    }    

    public function getFeed(){
        return view('feed');
    }

    public function postSignUp(Request $request) {
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);

        $this->validate($request, [
            'email' => 'email|unique:users', //nach dem doppelpunkt, sagt es dass es in der users Datenbank unique sein soll
            'first_name' => 'required|max:120',
            'password' => 'required|min:4'
        ]);
        $email = $request['email'];
        $username = $request['first_name'];
        $password = bcrypt($request['password']);

        #TODO automatische user_id zuordnen (habe schon markus gefragt)
        DB::insert('insert into users(username, email, user_password, profile_bio, profile_img, is_admin, remember_token, created_at) 
          values(?,?,?,?,?,?,?,?)',[$username, $email, $password, NULL, NULL, 0, NULL, $currentTimestamp]);



        #TODO globale user_id variable übergeben
        global $currentUserID;
        $currentUserID = DB::select('select user_id from users where email = ?', [$email]);

        return redirect()->route('feed');

    }

    
    public function postSignIn(Request $request) {


        if (Auth::guard('web')->attempt(['email' => $request['email'], 'password' => $request['password']])){

            global $currentUserID;
            $currentUserID = DB::select('select user_id from users where email = ?', [$request['email']]);

            return redirect()->route('feed');
        } else {

            #TODO das soll eigentlich wieder zu welcome leiten aber idk how
            return redirect()->route('/');
        }
        
    }


    public function postTweet(Request $request){
        $currentTimeString = time();
        $currentTimestamp = date('Y-m-d H:i:s',$currentTimeString);

        DB::insert('insert into tweets(user_id, tweet, img, created_at) 
        values(?,?,?,?)',[1, $request["tweet"], NULL ,$currentTimestamp]);

        return redirect()->route('feed');
    }
}