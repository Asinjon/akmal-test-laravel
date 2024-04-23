<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function show($user_id)
    {
        return view('book.index', compact('user_id'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(BookStoreRequest $request)
    {
        Books::create($request->validated());

        return redirect()->route('welcome');
    }

    public function edit(Books $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(BookUpdateRequest $request, Books $book)
    {
        $book->name  = $request->name;
        $book->pages = $request->pages;
        $book->save();

        return view('book.index');
    }

    public function destroy(Books $book)
    {
        $book->delete();

        return redirect()->route('welcome');
    }
    public function comments($book_id) {
        return view('user.comments.bookComments', compact('book_id'));
    }
    public function createComments(Request $request) {
        Comments::create($request->all());
        return redirect()->route('welcome');
    }
}