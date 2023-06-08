<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller {

    public function show() {
        return view('profile');
    }

    public function getProfile($username) {
        $profileUsername = "LULU";
        /*$profile = User::where('username', $this->profileUsername)->first();
        $profileID = $profile->id;
        $profilePic = $profile->profile_img;
        $profileBio = $profile->profile_bio;*/

        return view('profile',compact('profileUsername'));
    }
}


?>