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
            $library = App\Models\Posts::all();
            ?>
            @foreach($library as $post)
            <?php
                $user = App\Models\User::find($post->user_id);
                $user_name = $user->name;
            ?>
                {{ "ID:" . $post->id}}<br>
                {{ "Имя:" . $post->name}}<br>
                {{ "Автор:" . $user_name}}<br>
                {{ "Описание:" . $post->description}}<br>
                {{ "Дата публикации:" . $post->created_at}}<br>
                <a href="/postComments/{{ $post->id }}">
                    <img src="{{ asset('storage/images/2024-04-03/2182946.png')}}" alt="Комментарии" height="40">
                </a><=Комментарии<br>
                <?php
                $auth_user_id = Illuminate\Support\Facades\Auth::id();
                $post_user_id = $post->user_id;
                if($auth_user_id == $post_user_id) { ?>
            <a href="/updatePost/{{ $post->id }}">Редактировать</a>
            <?php } ?>
            <br><br> 
            @endforeach
        <br>
        @if(auth()->check())
        <form action="/postsMake" method="post">
            @csrf
            <input type="text" name="name">Имя<br>
            <textarea name="description" placeholder="Введите описание" id="www"></textarea>
            <input type="hidden" name="user_id" value="{{ Illuminate\Support\Facades\Auth::id() }}">
            <input type="submit" value="Создать пост">
        </form>
        @endif
        <br>
        <a href="{{ route('welcome') }}">Главная</a>
</body>
</html>