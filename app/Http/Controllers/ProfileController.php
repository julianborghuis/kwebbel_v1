<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($username)
    {
        $profileModal = new ProfileModal(); 
        $result = DB::table('users')
        ->where('username', $username)
        ->get();

        return view('profile.profile', ['username' => $username, 'userData' => $result]);
    }
}
