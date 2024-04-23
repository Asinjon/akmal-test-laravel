<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <?php 
        $post = App\Models\Posts::find($post_id);
    ?>
    <form action="/update_post" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $post_id }}">
        <input type="text" name="name" value="{{ $post->name }}">Имя<br>
        <textarea name="description" id="www">{{ $post->description }}</textarea>
        <input type="submit" value="Обновить">
    </form>
    <a href="/delete_post/{{ $post_id; }}">
        <img src="{{ asset('storage/images/2024-04-03/64022.png') }}" alt="Удалить" height="20">
    </a> <=Удалить
</body>
</html>