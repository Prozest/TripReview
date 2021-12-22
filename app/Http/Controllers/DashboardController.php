<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
{
    //The auth thing
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'userpage']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('pages.dashboard')->with('posts', $user->posts);
    }

    public function userpage($id)
    {
        $user = User::find($id);
        $posts = Post::orderBy('created_at','asc')->where('user_id', $id)->get();
        if(count($posts) > 0){
            return view('pages.userpage')->with('posts', $user->posts)->with('user', $user);
        } else {
            $posts = null;
            return view('pages.userpage')->with('posts', $posts)->with('user', $user);
        }

    }
}
