<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
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
            $library = App\Models\Posts::where('user_id', '=', $user_id)->select('id', 'name', 'user_id', 'description', 'created_at')->get();
            $user = App\Models\User::find($user_id);
            $user_name = $user->name;
            foreach($library as $post){
                echo "ID:" . $post->id . "<br>";
                echo "Имя:" . $post->name . "<br>";
                echo "Автор:" . $user_name . "<br>";
                echo "Описание:" . $post->description . "<br>";
                echo "Дата публикации:" . $post->created_at . "<br>";     
       ?> 
            <a href="/postComments/{{ $post->id }}">
                    <img src="{{ asset('storage/images/2024-04-03/2182946.png')}}" alt="Комментарии" height="40">
                 </a><=Комментарии<br>
            <a href="/updatePost/{{ $post->id }}">Редактировать</a>
            <br><br>
       <?php } 
        ?>
        <br>
        <form action="/postsMake" method="post">
            @csrf
            <input type="text" name="name">Имя<br>
            <textarea name="description" placeholder="Введите описание" id="www"></textarea>
            <input type="hidden" name="user_id" value="{{$user_id}}">
            <input type="submit" value="Создать книгу">
        </form>
        <br>
        <a href="{{ route('welcome') }}">Главная</a>
</body>
</html>