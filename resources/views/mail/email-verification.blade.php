<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification</title>
</head>
<body>
<form action="{{ route('verification-check') }}" method="post">
    @csrf
    <p>Пароль был отправлен на вашу почту введите его</p>
    <input type="text" name="token">Код<br>
    <input type="submit" value="Проверить">
</form>
</body>
</html>