<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DB;

class Profile extends Model
{
    public function getUserDetails($username){
        $result = DB::table('users')
        ->where('username', $username)
        ->first();

        $result->password = '*****';
        return $result;
    }

    public function getUserFriends($user_id){
        $result = DB::table('user_friends')
        ->where('user_id', $user_id)
        ->get();

        $friends = array();

        foreach($result as $friend){
            $friend = $friend->friend_id;
            $friend_info = DB::table('users')
            ->select('firstname', 'lastname', 'avatar', 'username')
            ->where('id', $friend)
            ->first();

            array_push($friends, $friend_info);
        }

        return $friends;
    }
    public function sendFriendRequest($user_id, $target_id){
        
        $insert = DB::table('pending_friend_requests')->insert(
            ['user_id' => $user_id, 'friend_id' => $target_id]
        );

        return;
    }
}
