<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;


use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::paginate(9);

        return view('posts.index', [
            'posts' => $allPosts
        ]);
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        return view('posts.show', [
            'post' => $post,

            ]);
    }

    public function create()
    {
        return view('posts.create', [
            'users' => User::all()
        ]);
    }
    public function edit($postId)
    {
        $post = Post::find($postId);
        return view('posts.edit', [
            'post' => $post,
            'users' => User::all()
        ]);
    }
    public function update($postId, Request $request)
    {
        $requestData= $request->all();

        $post = Post::find($postId);

        $post->update($requestData);


        $post->save();
        return redirect()->route('posts.index');
    }

    public function store(Request $request)
    {
        $requestData= $request->all();
        Post::create($requestData);
        return redirect()->route('posts.index');
    }
    public function destroy($postId)
    {
        $post = Post::findorfail($postId);

        $post->delete();
        return redirect()->route('posts.index');
    }
}
