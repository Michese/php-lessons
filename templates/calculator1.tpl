<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<main>
    <header>
        <ul class="menu">
            <li><a href="/index/" class="menu__link">Главная</a></li>
            <li><a href="/gallery/" class="menu__link">Галлерея</a></li>
            <li><a href="/goods/" class="menu__link">Товары</a></li>
            <li><a href="/cart/" class="menu__link">Корзина</a></li>
        </ul>
    </header>
    <form method="post" class="form">
        <input type="number" name="operand1">
        <select name="operation">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="/">/</option>
            <option value="*">*</option>
        </select>
        <input type="number" name="operand2">
        <input type="submit" value="=">
    </form>
    <p>{{ANSWER}}</p>
</main>
</body>
</html>