<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function bookcomments($book)
    {
        $comments = Comment::where('book_id', '=', $book)->select('id', 'book_id', 'user_id', 'text',
            'created_at')->with('user')->get();

        return view('comments.bookComments', compact(['comments', 'book']));
    }
    public function postcomments($post)
    {
        $comments = Comment::where('post_id', '=', $post)->select('id', 'post_id', 'user_id', 'text',
            'created_at')->with('user')->get();

        return view('comments.postComments', compact(['comments', 'post']));
    }

    public function storeComments(StoreRequest $request)
    {
        Comment::create($request->validated());

        return redirect()->route('welcome');
    }
}
