<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hobby;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $hobbies = Hobby::select()
        ->where('user_id', auth()->id())
        ->orderBy('updated_at', 'DESC')
        ->get();

        return view('home')->with([

            'hobbies' => $hobbies,
            'message_success' => Session::get('message_success'),

        ]);
    }
}
