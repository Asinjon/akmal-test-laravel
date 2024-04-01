<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
      body {
        background-color: LightGray;
      }

      .input {
        border: none;
        outline: none;
        border-radius: 15px;
        padding: 1em;
        background-color: #ccc;
        box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
        transition: 300ms ease-in-out;
      }

      .input:focus {
        background-color: white;
        transform: scale(1.05);
        box-shadow: 13px 13px 100px #969696,
        -13px -13px 100px #ffffff;
      }

      button {
        border: none;
        outline: none;
        background-color: #6c5ce7;
        padding: 10px 20px;
        font-size: 12px;
        font-weight: 700;
        color: #fff;
        border-radius: 5px;
        transition: all ease 0.1s;
        box-shadow: 0px 5px 0px 0px #a29bfe;
      }

      button:active {
        transform: translateY(5px);
        box-shadow: 0px 0px 0px 0px #a29bfe;
      }

    </style>
</head>

<body>
<form action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" autocomplete="off" name="name" class="input" placeholder="Username"><br>
    <input type="text" autocomplete="off" name="email" class="input" placeholder="Email"><br>
    <input type="password" autocomplete="off" name="password" class="input" placeholder="Password"><br>
    <input type="password" autocomplete="off" name="password_confirmation" class="input" placeholder="Confirm Password"><br>
    <input type="file" name="avatar">Аватар<br>
    <button>
        Send
    </button>
</form>
<a href="{{  route('login.create')  }}">Вход</a><br>
<a href="{{ route('welcome') }}">Главная</a>
</body>
</html>