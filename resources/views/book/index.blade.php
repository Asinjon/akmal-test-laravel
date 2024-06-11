<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <style>
      body {
        width: 100%;
        height: 100%;
        background: #f1f1f1;
        background-image: linear-gradient(
            90deg,
            transparent 50px,
            #ffb4b8 50px,
            #ffb4b8 52px,
            transparent 52px
        ),
        linear-gradient(#e1e1e1 0.1em, transparent 0.1em);
        background-size: 100% 30px;
      }
    </style>
</head>
<body>
@foreach($books as $book)
    <br>
    ID: {{$book->id}} <br>
    Имя: {{ $book->name }} <br>
    Автор: {{ $book->user->name }} <br>
    Кол-во страниц: {{ $book->pages }} <br>
    @if(\Illuminate\Support\Facades\Auth::id() == $book->user_id)
        <a href="/books/{{ $book->id }}/edit">Редактировать</a><br>
        <form action="books/{{ $book->id }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Удалить">
        </form>
    @endif
    <a href="/book_comment/{{ $book->id }}">
        <img src="{{ asset('files/2182946.png') }}" alt="Комментарии" height="30">
    </a><br>
@endforeach
<br>
@if(auth()->check())
    <a href="/books/create">Создать книгу</a>
    <br>
    <br>
    <br>
@endif
<a href="{{ route('welcome') }}">Главная</a>
</body>
</html>