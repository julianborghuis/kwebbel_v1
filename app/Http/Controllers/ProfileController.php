<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($username)
    {
        $profileModal = new \App\Profile();
        
        $userDetails = $profileModal->getUserDetails($username);
        $userFriends = $profileModal->getUserFriends($userDetails->id);

        return view('profile.profile', ['username' => $username, 'userData' => $userDetails, 'friends' => $userFriends]);
    }

    public function sendFriendRequest(Request $request){

        $profileModal = new \App\Profile();
        $user_id = Auth::user()->id;

        $profileModal->sendFriendRequest($user_id, $request->incommingFriendRequest);
                
        return redirect()->route('profile', [$request->username])->with('success', 'U heeft een vriendschap verzoek verstuurd!');

    }
}
