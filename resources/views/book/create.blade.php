<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создание книги</title>
</head>
<body>
<p>Создайте книгу</p>
<form action="/books/" method="post">
    @csrf
    <input type="text" name="name">Имя<br>
    <input type="number" name="pages">Кол-во страниц<br>
    <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
    <input type="submit" value="Создать книгу">
</form>
</body>
</html>