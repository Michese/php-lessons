<p>{{RESPONSE}}</p>
<h2>Войти</h2>
<form method="post" class="form">
    <input type="hidden" name="sign_in">
    <input type="text" name="login" placeholder="Логин" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <input type="checkbox" name="rememberme">
    <input type="submit" value="Войти">
</form>
<h2>Зарегистрироваться</h2>
<form method="post" class="form">
    <input type="hidden" name="sign_up">
    <input type="text" name="name" placeholder="Имя" required>
    <input type="text" name="login" placeholder="Логин" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <input type="submit" value="Зарегистрироваться">
</form>