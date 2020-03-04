<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \DB;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('search');

    }
    
    public function search(Request $request){

        $validatedData = $request->validate([
            'search' => 'min:3|max:50' 
        ]);
        
        $result = DB::table('users')
            ->where('username', 'like', '%'.$request->search.'%')
            ->get();

        if(count($result) < 1){
            return view('/search', ['error' => 'Geen resultaten voor: '. $request->search]);
        }
        return view('/search', ['users' => $result,
        'search' => $request->search
        ]);
    }
}
