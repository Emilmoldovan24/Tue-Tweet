<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username) {
        $profileUsername = $username;
        /*$profile = User::where('username', $this->profileUsername)->first();
        $profileID = $profile->id;
        $profilePic = $profile->profile_img;
        $profileBio = $profile->profile_bio;*/

        return view('profile',compact('profileUsername'));
    }
}
