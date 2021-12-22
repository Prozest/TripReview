<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PageController extends Controller
{
    public function home(){

        $posts = Post::orderBy('created_at','asc')->get();
        return view('pages.home')->with('posts', $posts);
    }

    public function about(){
        return view('pages.about');
    }
}
