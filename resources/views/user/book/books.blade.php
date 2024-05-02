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
        <?php
            $library = App\Models\Books::all();
            ?>
            @foreach($library as $book)
            <?php
                $user = App\Models\User::find($book->user_id);
                $user_name = $user->name;
            ?>
                {{ "ID:" . $book->id }} <br>
                {{ "Имя:" . $book->name }} <br>
                {{ "Автор:" . $user_name }} <br>
                {{ "Кол-во страниц:" . $book->number_of_pages }} <br>
                {{ "Дата публикации:" . $book->created_at }} <br>
                <a href="/bookComments/{{ $book->id }}">
                    <img src="{{ asset('storage/images/2024-04-03/2182946.png')}}" alt="Комментарии" height="40">
                </a><=Комментарии<br>
                 <?php
                $auth_user_id = Illuminate\Support\Facades\Auth::id();
                $book_user_id = $book->user_id;
                if($auth_user_id == $book_user_id) { ?>
                
                <a href="/updateBook/{{ $book->id }}">Редактировать</a>
             <?php } ?>
                <br>
                <br>
            @endforeach
        <br>
        @if(auth()->check())
        <form action="/booksMake" method="post">
            @csrf
            <input type="text" name="name">Имя<br>
            <input type="number" name="number_of_pages">Кол-во страниц<br>
            <input type="hidden" name="user_id" value="{{ Illuminate\Support\Facades\Auth::id() }}">
            <input type="submit" value="Создать книгу">
        </form>
        @endif
    <br>
    <a href="{{ route('welcome') }}">Главная</a>
</body>
</html>