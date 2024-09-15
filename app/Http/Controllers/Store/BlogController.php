<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index() {
        $posts = Post::where('status', 'published')->get();
        return view('Store.blog', compact('posts'));
    }

    public function blog_details($slug) {
        $post = Post::where('slug', $slug)->first();
        return view('Store.blog-details', compact('post'));
    }

}
