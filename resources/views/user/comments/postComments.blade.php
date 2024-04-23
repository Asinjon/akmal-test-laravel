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
    </style>
</head>
<body>
<?php
            $comments = App\Models\Comments::where('post_id', '=', $post_id)->select('id', 'post_id', 'user_id', 'text', 'created_at')->get();
            foreach($comments as $comment){
                $user = App\Models\User::find($comment->user_id);
                $user_name = $user->name;
                echo "Автор:" . $user_name .  "<br>";
                echo "{" . $comment->text . "}" ."<br>";
                echo "Дата публикации:" . $comment->created_at . "<br>";
                ?>
                <br>
                <br>
        <?php }
        ?>
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