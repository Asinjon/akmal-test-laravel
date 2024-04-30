<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            --color: #E1E1E1;
            background-color: #F3F3F3;
            background-image: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent),
                linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%,transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%,transparent);
            background-size: 55px 55px;
        }
        .tooltip-container {
  --background: #333333;
  --color: #000000;
  position: relative;
  cursor: pointer;
  transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
  font-size: 18px;
  font-weight: 600;
  color: var(--color);
  padding: 0.7em 1.8em;
  border-radius: 8px;
  text-transform: uppercase;
  height: 60px;
  width: 180px;
  display: grid;
  place-items: center;
  border: 2px solid var(--color);
}

.text {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: grid;
  place-items: center;
  transform-origin: -100%;
  transform: scale(1);
  transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
}

.tooltip-container span:last-child {
  position: absolute;
  top: 0%;
  left: 100%;
  width: 100%;
  height: 100%;
  border-radius: 8px;
  opacity: 1;
  background-color: var(--background);
  z-index: -1;
  border: 2px solid var(--background);
  transform: scale(0);
  transform-origin: 0;
  transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
  display: grid;
  place-items: center;
}

.tooltip {
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  padding: 0.3em 0.6em;
  opacity: 0;
  pointer-events: none;
  transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
  background: var(--background);
  z-index: -1;
  border-radius: 8px;
  scale: 0;
  transform-origin: 0 0;
  text-transform: capitalize;
  font-weight: 400;
  font-size: 16px;
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
}

.tooltip::before {
  position: absolute;
  content: "";
  height: 0.6em;
  width: 0.6em;
  bottom: -0.2em;
  left: 50%;
  transform: translate(-50%) rotate(45deg);
  background: var(--background);
}

.tooltip-container:hover .tooltip {
  top: -100%;
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
  scale: 1;
  animation: shake 0.5s ease-in-out both;
}

.tooltip-container:hover {
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
  color: white;
  border-color: transparent;
}

.tooltip-container:hover span:last-child {
  transform: scale(1);
  left: 0;
}

.tooltip-container:hover .text {
  opacity: 0;
  top: 0%;
  left: 100%;
  transform: scale(0);
}

@keyframes shake {
  0% {
    rotate: 0;
  }

  25% {
    rotate: 7deg;
  }

  50% {
    rotate: -7deg;
  }

  75% {
    rotate: 1deg;
  }

  100% {
    rotate: 0;
  }
}

    </style>
</head>
<body>
<?php
            $comments = App\Models\Comments::where('post_id', '=', $post_id)->select('id', 'post_id', 'user_id', 'text', 'created_at')->get();
            ?>
            @foreach($comments as $comment)
                <?php 
                $user = App\Models\User::find($comment->user_id); 
                $user_name = $user->name;
                ?>
                <br><br><br><br>
                <div class="tooltip-container">
                    <span class="tooltip">{{ $comment->created_at }}</span>
                    <span class="text">{{ $user_name }}</span>
                    <span>{{ $comment->text }}</span>
                </div>
                <br>
            @endforeach
                <br>
                <br>
        <br>
        <form action="/make_postComments" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post_id }}">
            <input type="hidden" name="user_id" value="{{ Illuminate\Support\Facades\Auth::id(); }}">
            <textarea name="text" placeholder="Введите комментарий" id="www"></textarea>
            <input type="submit" value="Send">
        </form>
</body>
</html>