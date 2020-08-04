<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
</head>
<body>
<main>
    <header>
        <ul class="menu">
            <li><a href="/index/" class="menu__link">Главная</a></li>
            <li><a href="/gallery/" class="menu__link">Галлерея</a></li>
            <li><a href="/goods/" class="menu__link">Товары</a></li>
            <li><a href="/cart/" class="menu__link">Корзина</a></li>
            <li><a href="/reviews/" class="menu__link">Отзывы</a></li>
            <li><a href="/{{REGISTER_LINK}}/" class="menu__link">{{REGISTER}}</a></li>
            {{LOGOUT}}
        </ul>
    </header>
    <h1>Добро пожаловать!</h1>
    <h2>{{GREETING}}</h2>
</main>
</body>
</html>