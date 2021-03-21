<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::all();

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
    public function edit()
    {
        $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20','email'=> 'ahmed@gmail.com'];

        return view('posts.edit', [
            'post'=>$post,
        ]);
    }
    public function update($postId)
    {
        return redirect()->route('posts.index');
    }

    public function store()
    {
        return redirect()->route('posts.index');
    }
}
