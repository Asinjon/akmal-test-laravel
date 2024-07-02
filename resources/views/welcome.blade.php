<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
      body {

        width: 100%;
        height: 100%;


        background: #121212;
        background: linear-gradient(
            135deg,
            #121212 25%,
            #1a1a1a 25%,
            #1a1a1a 50%,
            #121212 50%,
            #121212 75%,
            #1a1a1a 75%,
            #1a1a1a
        );
        background-size: 40px 40px;


        animation: move 4s linear infinite;
      }

      a:link {
        color: LightGray;
        background-color: transparent;
        text-decoration: none;
      }

      a:visited {
        color: Gray;
        background-color: transparent;
        text-decoration: none;
      }

      a:hover {
        color: LightGray;
        background-color: transparent;
        text-decoration: underline;
      }

      a:active {
        color: Tomato;
        background-color: transparent;
        text-decoration: underline;
      }

      @keyframes move {
        0% {
          background-position: 0 0;
        }
        100% {
          background-position: 40px 40px;
        }
      }

      table {
        font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        text-align: left;
        border-collapse: separate;
        border-spacing: 5px;
        background: #ECE9E0;
        color: #656665;
        border: 16px solid #ECE9E0;
        border-radius: 20px;
      }

      th {
        font-size: 18px;
        padding: 10px;
      }

      td {
        background: #F5D7BF;
        padding: 10px;
      }
    </style>
</head>
<body>
<h1 style="color:LightGray;">Добро пожаловать</h1>
@if(auth()->check())
    <h1 style="color:LightGray;">Вы авторизованы</h1>
@else
    <h1 style="color:LightGray;">Вы гость</h1>
@endif
<h2><a href="/books">Список книг</a></h2>
<h2><a href="/posts">Список постов</a></h2>
<br>
<br>
@if(auth()->check())
        <a href="#">{{ auth()->user()->name }}
        @if (auth()->user()->avatar)
            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="" height="40">
            @else
                <img src="{{ asset('files/149071.png') }}" alt="" height="40">
        @endif
    </a><br>
    <a href="{{  route('logout')  }}">Выход</a><br>
@else
    <a href="{{  route('register')  }}">Регистрация</a><br>
    <a href="{{  route('login.create')  }}">Вход</a><br>
@endif
</body>
</html>
