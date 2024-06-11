<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot password</title>
</head>
<body>
@if(session('status'))
    <p>Ссылка на смену пароля была отправлена</p>
@endif
<form action="/forgot-password" method="post">
    @csrf
    <input type="email" name="email">Email<br>
    <input type="submit" value="Send Reset Link">
</form>
</body>
</html>