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
}
