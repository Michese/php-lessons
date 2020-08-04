<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="../js/gallery.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <div class="products">
        {{RENDER_IMAGE}}
    </div>
</main>
</body>
</html>