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
        $user = Auth::user();

        if($_FILES["avatar"]["tmp_name"]){
            $target_path = basename( $_FILES['avatar']['name']);
            move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path);

            $im = file_get_contents($_FILES['avatar']['name']);
            $imdata = base64_encode($im);
            
            $user->avatar = $imdata;
            $user->save();

            unlink($_FILES['avatar']['name']);

            return view('profile.me', ['message' => 'Uw profiel foto is bijgewerkt!']);

        }else{
            return view('profile.me', ['error' => 'Er ging iets fout. ']);
        }
    }
}
