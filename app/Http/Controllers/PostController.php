<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\PostLike;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //The auth thing
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'asc')->get();
        return view('pages.home')->with('posts', $posts);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::orderBy('created_at', 'asc')->where('comments.post_id', $id)->get();
        return view('posts.post')->with('post', $post)->with('comments', $comments);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'resortname' => 'required',
            'summary' => 'required',
            'cover_image' => 'image|required|max:1999',
            'body' => 'required',
            'country' => 'required',
            'rating' => 'required',
            'state' => 'required'
        ]);

        $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $fileNametoStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNametoStore);


        $post = new Post;
        $post->title = $request->input('resortname');
        $post->summary =  $request->input('summary');
        $post->country =  $request->input('country');
        $post->state =  $request->input('state');
        $post->body = $request->input('body');
        $post->rating = $request->input('rating');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNametoStore;
        $post->save();

        return redirect('/')->with('success', 'Post Createed');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        //Check authorisation
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/')->with('error', 'Unauthorized access to that page');
        }

        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|required|max:1999'
        ]);

        $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        $fileNametoStore = $fileName . '_' . time() . '.' . $extension;
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNametoStore);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $fileNametoStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Edited');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        //Check authorisation
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/')->with('error', 'Unauthorized access to that page');
        }

        Storage::delete('public/cover_images/' . $post->cover_image);
        $comments = $post->comments;
        foreach($comments as $comment){
            $comment=Comment::find($comment->id);
            $comment->delete();
        }
        $likes = $post->likes;
        foreach($likes as $like){
            $like=PostLike::find($like->id);
            $like->delete();
        }
        $post->delete();

        return redirect('/posts')->with('error', 'Post Removed');
    }

    public function comment(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $comment = new Comment;
        $comment->body = $request->input('body');
        $comment->post_id = $id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        $post = Post::find($id);
        $comments = Comment::orderBy('created_at', 'asc')->where('comments.post_id', $id)->get();
        return redirect('posts/' . $id)->with('post', $post)->with('comments', $comments);
    }

    public function like($id, $_like)
    {
        $user = Auth()->user();
        $userlike = 0;
        $found = false;
        foreach ($user->likes as $_userlike) {
            if ($_userlike->post_id == $id) {
                $found = true;
                $userlike = $_userlike->id;
            }
        }

        if ($found) {
            $like = PostLike::find($userlike);
            $like->delete();
        } else {
            $like = new PostLike();
            $like->like = $_like;
            $like->user_id = Auth()->user()->id;
            $like->post_id = $id;
            $like->save();
        }

        $post = Post::find($id);
        $comments = Comment::orderBy('created_at', 'asc')->where('comments.post_id', $id)->get();
        return redirect('posts/' . $id)->with('post', $post)->with('comments', $comments);
    }
}
