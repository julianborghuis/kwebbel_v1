<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Profile;

class ProfileController extends Controller
{
    public function index($username)
    {
        $profileModal = new \App\Profile();
        $user = Auth::user();
        
        $userDetails = $profileModal->getUserDetails($username);
        $userFriends = $profileModal->getUserFriends($userDetails->id);
        $checkIsFriend = $profileModal->isFriend($user->id, $userDetails->id);



        return view('profile.profile', ['username' => $username, 'userData' => $userDetails, 'friends' => $userFriends, 'friend' => $checkIsFriend]);
    }

    public function sendFriendRequest(Request $request){

        $profileModal = new \App\Profile();
        $user_id = Auth::user()->id;

       $incomming_request = $profileModal->sendFriendRequest($user_id, $request->incommingFriendRequest);

        if($incomming_request == "PENDING_REQUEST"){
            return redirect()->route('profile', [$request->username])->with('error', 'Er is al een vriendschap verzoek gestuurd!');   
        }elseif($incomming_request == "ALREADY_FRIEND"){
            return redirect()->route('profile', [$request->username])->with('error', 'U bent al vrienden met '. $request->username);  
        }elseif($incomming_request == "NO_REQUEST")
        return redirect()->route('profile', [$request->username])->with('success', 'U heeft een vriendschap verzoek verstuurd!');
    }

    public function removeFriend(Request $request){

        $profileModal = new \App\Profile();
        $user_id = Auth::user()->id;

       $remove_friend = $profileModal->removefriend($user_id, $request->incommingFriendRemoval);

        
       if($remove_friend){
        return redirect()->route('profile', [$request->username])->with('success', $remove_friend);   
       }else{
        return redirect()->route('profile', [$request->username])->with('error', 'Er is iets fout gegaan.');  
       }
    }
}
