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
    @if($thisUserId == $book->user_id)
        <a href="/book/update/{{ $book->id }}">Редактировать</a><br>
    @endif
    <a href="/book_comment/{{ $book->id }}">
        <img src="{{ asset('files/2182946.png') }}" alt="Комментарии" height="30">
    </a><br>
@endforeach
<br>
@if(auth()->check())
    <a href="/book/store">Создать книгу</a>
    <br>
    <br>
    <br>
@endif
<a href="{{ route('welcome') }}">Главная</a>
</body>
</html>