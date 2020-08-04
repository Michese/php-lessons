<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>{{TITLE}}</title>
</head>
<body>
<header>
    <ul class="menu">
        <li><a href="/index/" class="menu__link">Главная</a></li>
        <li><a href="/gallery/" class="menu__link">Галлерея</a></li>
        <li><a href="/goods/" class="menu__link">Товары</a></li>
        <li><a href="/cart/" class="menu__link">Корзина</a></li>
        <li><a href="/reviews/" class="menu__link">Отзывы</a></li>
    </ul>
</header>
<main>
    <div class="reviews">
        <h2>Отзывы</h2>
        <form method="post" class="form">
            <input type="text" name="name">
            <textarea name="text" cols="30" rows="6"></textarea>
            <p>{{RESPONSE}}</p>
            <input type="submit" value="Отправить">
        </form>
        {{REVIEWS}}
    </div>
</main>
</body>
</html>