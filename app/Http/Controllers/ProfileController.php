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


        return view('profile.profile', ['username' => $username, 'userData' => $userDetails]);
    }
}
