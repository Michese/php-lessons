<?php
function activeIndex() {
    $vars = [];
    $vars["greeting"] = " ";
    $vars["register"] = " ";
    $vars["register_link"] = " ";
    $vars["logout"] = ' ';
    if (isset($_SESSION["user"])) {
        $vars["greeting"] = "Привет, " . $_SESSION["user"]["name_user"] . "!";
        $vars["register"] = "Личный кабинет";
        $vars["register_link"] = "account";
        $vars["logout"] = "<li><a href='/logout/' class='menu__link'>Выйти</a></li>";
    } else {
        $vars["register"] = "Войти";
        $vars["register_link"] = "register";
    }
    return $vars;
}