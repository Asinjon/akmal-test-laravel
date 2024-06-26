<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Requests\Comment\StoreRequest;
use App\Models\Book;
use App\Models\Comment;

class BookController extends Controller
{
    public function index()
    {
        $books  = Book::with('user')->get();
        $thisUserId = \Illuminate\Support\Facades\Auth::id();

        return view('book.index', compact(['books', 'thisUserId']));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(BookStoreRequest $request)
    {
        Book::create($request->validated());

        return redirect()->route('welcome');
    }

    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(BookUpdateRequest $request, Book $book)
    {
        $book->name  = $request->name;
        $book->pages = $request->pages;
        $book->save();

        return view('book.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('welcome');
    }
}