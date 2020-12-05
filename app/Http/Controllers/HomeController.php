<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        $user_id =  Auth::user()->id; // getting current user id
        $blogs = BlogModel::where('user_id','=',$user_id)->simplePaginate(3); // getting all the blog created by the current login user

        return view('home',compact('blogs'));
    }
}
