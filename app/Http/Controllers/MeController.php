<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;
use Validator,Redirect,Response,File, Auth;
use \App\Me;

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
        $meModal = new \App\Me();

        $friend_requests = $meModal->checkFriendRequests();
        
        return view('profile.me', ['friend_requests' => $friend_requests]);
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

    public function checkFriendRequests(){
        $meModal = new \App\Me();

        $friend_requests = $meModal->checkFriendRequests();

        if(!$friend_requests){
            return 'NO_FRIEND_REQUESTS';
        }

        return $friend_requests;
    }
    public function acceptFriend(Request $request){

        $id = $request->friend_id;

        $meModal = new \App\Me();

        $accept = $meModal->acceptFriend($id);

        return view('profile.me', ['success' => 'U heeft de vriendschap verzoek geaccepteerd.']);

    }

    public function denyFriend(Request $request){
        $meModal = new \App\Me();

        $deny = $meModal->denyFriend($id);

        return view('profile.me', ['success' => 'U heeft de vriendschap verzoek afgewezen.']);
        
    }
}
