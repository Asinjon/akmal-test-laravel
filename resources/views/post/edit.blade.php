<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <form action="/post/update/{{ $post->id }}" method="post">
        @csrf
        <input type="text" name="name" value="{{ $post->name }}">Название<br>
        <textarea name="description" id="www" >{{ $post->description }}</textarea><br>
        <input type="submit" value="Отправить">
    </form>
    <a href="/post/delete/{{ $post->id }}">
        <img src="{{ asset('files/64022.png') }}" alt="Удалить" height="20">
    </a> <=Удалить
</body>
</html>