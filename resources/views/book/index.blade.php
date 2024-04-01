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
@php
    $user_id = \Illuminate\Support\Facades\Auth::id();
    $library = App\Models\Books::where('user_id', '=', $user_id)->select('id', 'name', 'user_id', 'pages')->get();
    $user = App\Models\User::find($user_id);
    $user_name = $user->name;
@endphp
@foreach($library as $book)
    ID: {{$book->id}} <br>
    Имя: {{ $book->name }} <br>
    Автора: {{ $user_name }} <br>
    Кол-во страниц: {{ $book->pages }} <br>
    <a href="/update/{{ $book->id }}">Редактировать</a>
    <br><br>
@endforeach


<br>
<a href="/booksMake">Создать книгу</a>
<br>
<br>
<br>
<a href="{{ route('welcome') }}">Главная</a>
</body>
</html>