<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('dashboard.posts.all-posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'status' => 'required',
            'created_by' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        $data = $request->except('image', '_token');
        if($request->file('image')) {
            $data['image'] = Media::UploadMedia($request->file('image'), 'posts');
        }
        Post::create($data);
        return redirect()->back()->with('success', 'post created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.posts.edit-post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $post = Post::findOrFail($id);
        $data = $request->except('_token', 'image');
        if($request->file('image')) {
            $data['image'] = Media::UploadMedia($request->file('image'), 'posts');
            Media::deleteMedia($post->image, 'posts');
        }
        $post->update($data);
        return redirect()->back()->with('success', 'post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        Media::deleteMedia($post->image, 'posts');
        $post->delete();
        return redirect()->back()->with('success', 'post deleted successfully');
    }
}
