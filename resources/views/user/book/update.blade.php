<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <style>
        body {
            /* width: 100%;
            height: 100%;
            --s: 37px; 

            --c: #0000, #282828 0.5deg 119.5deg, #0000 120deg;
            --g1: conic-gradient(from 60deg at 56.25% calc(425% / 6), var(--c));
            --g2: conic-gradient(from 180deg at 43.75% calc(425% / 6), var(--c));
            --g3: conic-gradient(from -60deg at 50% calc(175% / 12), var(--c));
            background: var(--g1), var(--g1) var(--s) calc(1.73 * var(--s)), var(--g2),
                var(--g2) var(--s) calc(1.73 * var(--s)), var(--g3) var(--s) 0,
                var(--g3) 0 calc(1.73 * var(--s)) #1e1e1e;
            background-size: calc(2 * var(--s)) calc(3.46 * var(--s)); */
            width: 100%;
            height: 100%;
            background: #f1f1f1;
            background-image: linear-gradient(
                90deg,
                transparent 50px,
                #ffb4b8 50px,
                #ffb4b8 52px,
                transparent 52px
                ),
                linear-gradient(#e1e1e1 0.1em, transparent 0.1em);
            background-size: 100% 30px;
        }
    </style>
</head>
<body>
    <?php 
        $book = App\Models\Books::find($book_id);
    ?>
    <form action="/update_book" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $book_id }}">
        <input type="text" name="name" value="{{ $book->name}}">Имя<br>
        <input type="number" name="number_of_pages" value="{{ $book->number_of_pages}}">Кол-во страниц<br>
        <input type="submit" value="Обновить">
    </form>
    <a href="/delete_book/{{ $book_id; }}">
        <img src="{{ asset('storage/images/2024-04-03/64022.png') }}" alt="Удалить" height="20">
    </a> <=Удалить
</body>
</html>