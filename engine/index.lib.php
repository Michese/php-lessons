<?php
function activeIndex() {
    $vars = [];
    $vars["greeting"] = " ";
    $vars["register"] = " ";
    $vars["logout"] = ' ';
    if (isset($_SESSION["user"])) {
        $vars["greeting"] = "Привет, " . $_SESSION["user"]["name_user"] . "!";
        $vars["register"] = "<li><a href='/account/' class='menu__link'>Личный кабинет</a></li>";
        $vars["logout"] = "<li><a href='/logout/' class='menu__link'>Выйти</a></li>";
    } else {
        $vars["register"] = "<li><a href='/register/' class='menu__link'>Войти</a></li>";
    }
    return $vars;
}