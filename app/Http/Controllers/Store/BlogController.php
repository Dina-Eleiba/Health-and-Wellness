<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function index() {
        $posts = Post::where('status', 'published')->get();
        return view('Store.blog', compact('posts'));
    }

    public function blog_details($slug) {
        $post = Post::where('slug', $slug)->first();
        $comments = $post->comments;
        return view('Store.blog-details', compact('post', 'comments'));
    }


    public function comments(Request $request) {

        $request->validate([
            'comment' => 'required',
        ]);
        $data = $request->except('_token');
        $data['user_id'] = Auth::user()->id;
        Comment::create($data);
        return redirect()->back()->with('success', 'Comment added successfully!');


    }

}
