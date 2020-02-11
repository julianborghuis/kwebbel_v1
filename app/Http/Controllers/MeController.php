<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
use Validator,Redirect,Response,File, Auth;

class MeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile.me');
        $user = Auth::user();

    }
    public function updateAvatar(Request $request){
        var_dump($_POST);
    }
}
