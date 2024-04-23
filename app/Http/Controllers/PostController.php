<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Books;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function read($user_id) {
        return view('user.posts.posts', compact('user_id'));
    }
    public function create(Request $request) {
        Posts::create($request->all());
        return redirect()->route('welcome');
    }
    public function updateForm($post_id) {
        return view('user.posts.updatePost', compact('post_id'));
    }
    public function updateCreate(Request $request) {
        $post = Posts::find($request->id);
        $user_id = Auth::id();
        $post->name = $request->name;
        $post->description = $request->description;
        $post->save();
        return view('user.posts.posts', compact('user_id'));
    }
    public function delete($post_id) {
        $post = Posts::find($post_id);
        $post->delete();
        return redirect()->route('welcome');
    }
    public function comments($post_id) {
        return view('user.comments.postComments', compact('post_id'));
    }
    public function createComments(Request $request) {
        Comments::create($request->all());
        return redirect()->route('welcome');
    }
}
