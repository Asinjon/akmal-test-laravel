<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\UpdateRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts  = Post::with('user')->get();

        return view('post.index', compact( 'posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StoreRequest $request)
    {
        Post::create($request->validated());

        return redirect()->route('welcome');
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post, UpdateRequest $request)
    {
        $post->name = $request->name;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('welcome');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('welcome');
    }
}
