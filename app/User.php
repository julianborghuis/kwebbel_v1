<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
Use DB;
Use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'city', 'firstname', 'lastname', 'province', '
        ', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUser($id){
       $user = DB::table('users')->where('id', $id)->get();
       $user->password = '*****';
       return $user;
    }

    public function getUsernameAvatar($id){
        $user = DB::table('users')->select('username', 'avatar')->where('id', $id)->first();

        return $user;
     }
}
