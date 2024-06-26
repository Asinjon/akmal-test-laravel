<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
      body {
        background-color: black;
      }

      .form-container {
        background: linear-gradient(#212121, #212121) padding-box,
        linear-gradient(120deg, transparent 25%, #1cb0ff, #40ff99) border-box;
        border: 2px solid transparent;
        padding: 32px 24px;
        font-size: 14px;
        color: white;
        display: flex;
        flex-direction: column;
        gap: 20px;
        box-sizing: border-box;
        border-radius: 16px;
      }

      .form {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
      }

      .heading {
        font-size: 20px;
        font-weight: 600;
      }

      .form-input {
        color: white;
        background: transparent;
        border: 1px solid #414141;
        border-radius: 5px;
        padding: 8px;
        outline: none;
      }

      button {
        border-radius: 5px;
        padding: 6px;
        background: #ffffff14;
        color: #c7c5c5;
        border: 1px solid #414141;
      }

      button:hover {
        background: #2AEF1C;
        cursor: pointer;
      }

      .form-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
        color: #414141;
        position: relative;
      }

      .form-group label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 5px;
        pointer-events: none;
        transition: 0.5s;
      }

      .form-group input:focus ~ label,
      .form-group input:valid ~ label {
        top: -16px;
        left: 0;
        background: #212121 padding-box;
        padding: 10px 0 0 0;
        color: #2AEF1C;

        font-size: 12px;
      }

    </style>
</head>
<body>
</div>
<div class="form-container">
    <form class="form" action="{{ route('login') }}" method="post">
        <span class="heading">Login Form</span>
        @csrf
        <div class="form-group">
            <input class="form-input" required="" type="email" name="email"/>
            <label>Email</label>
        </div>
        <div class="form-group">
            <input class="form-input" required="" type="password" name="password"/>
            <label>Password</label>
        </div>

        <button>Send</button>
    </form>
</div>
<a href="{{  route('register')  }}">Регистрация</a><br>
<a href="{{ route('welcome') }}">Главная</a>

</body>
</html>