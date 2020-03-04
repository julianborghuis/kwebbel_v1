<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
use \App\User;

class Me extends Model
{
    public function checkFriendRequests(){
        $id = Auth::user()->id;

        $userData = [];

        $friend_requests = DB::table('pending_friend_requests')->where('friend_id', $id)->get();
        $usermodal = new \App\User();
        

        foreach($friend_requests as $friend_request){
            $username = $usermodal->getUsernameAvatar($friend_request->user_id);
            $friend_request->username = $username->username;
            $friend_request->avatar = $username->avatar;
        }
        
        return $friend_requests;
    }

    public function denyFriend($id){
        $user_id = Auth::user()->id;

        return 'demny';
    }
    
    public function acceptFriend($id){
        $user_id = Auth::user()->id;

        DB::table('user_friends')->insert(
            ['user_id' => $user_id, 'friend_id' => $id]
        );

        
        DB::table('user_friends')->insert(
            ['user_id' => $id, 'friend_id' => $user_id]

        );

        DB::table('pending_friend_requests')->where(
            ['user_id' => $user_id,'friend_id' => $id]
        );

        return;

    }
}
