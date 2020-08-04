<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{TITLE}}</title>
</head>
<header>
    <ul class="menu">
        <li><a href="/index/" class="menu__link">Главная</a></li>
        <li><a href="/gallery/" class="menu__link">Галлерея</a></li>
        <li><a href="/goods/" class="menu__link">Товары</a></li>
        <li><a href="/cart/" class="menu__link">Корзина</a></li>
    </ul>
</header>
<body>
<main>
    <p>{{RESPONSE}}</p>
    <h2>Войти</h2>
    <form method="post" class="form">
        <input type="hidden" name="sign_in" >
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="checkbox" name="rememberme">
        <input type="submit" value="Войти">
    </form>
    <h2>Зарегистрироваться</h2>
    <form method="post" class="form">
        <input type="hidden" name="sign_up">
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit" value="Зарегистрироваться">
    </form>
</main>
</body>
</html>