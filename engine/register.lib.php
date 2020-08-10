<?php
function activeRegister()
{
    if (isset($_SESSION["user"]) || checkAuthWithCookie()) {
        header('Location: /');
        exit();
    }

    $response = " ";

    if (isset($_POST["sign_up"])) {
        $response = addUser();
    } else if (isset($_POST["sign_in"])) {
        $response = signInUser();
    }

    return ["title" => "Регистрация/Вход", "response" => $response];
}

function activeLogout()
{
    unset($_SESSION["user"]);
    session_destroy();
    header("Location: /");
    exit;
}

function addUser()
{
    $result = false;
    $response = " ";

    $db = getConnection();
    $login = mysqli_real_escape_string($db, (string)htmlspecialchars(strip_tags($_POST["login"])));
    $name = mysqli_real_escape_string($db, (string)htmlspecialchars(strip_tags($_POST["name"])));
    $password = mysqli_real_escape_string($db, (string)htmlspecialchars(strip_tags($_POST["password"])));

    $sql = "select * from user where login_user = '$login'";
    $assocResult = getAssocResult($sql);

    if (empty($assocResult)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "insert into user (login_user, name_user, password_user) values ('$login', '$name', '$password_hash')";
        $result = executeQuery($sql);
    } else {
        mysqli_close($db);
    }

    if ($result) {
        $response = "Пользователь успешно добавлен!";
    } else {
        $response = "Пользователь с таким логином уже существует!";
    }

    return $response;
}

function signInUser()
{
    $response = " ";

    $db = getConnection();
    $login = mysqli_real_escape_string($db, htmlspecialchars(strip_tags($_POST["login"])));
    $password = mysqli_real_escape_string($db, htmlspecialchars(strip_tags($_POST["password"])));

    $sql = "select * from user where login_user = '$login'";
    $assocResult = getAssocResult($sql);

    if (isset($assocResult[0]) && password_verify($password, $assocResult[0]["password_user"])) {

        if (isset($_POST['rememberme']) && $_POST['rememberme'] == 'on') {
            setcookie("id_user", $assocResult[0]['id_user'], time() + 86400);
            setcookie("cookie_hash", $assocResult[0]['password_user'], time() + 86400);
        }

        $_SESSION['user'] = $assocResult[0];
        header("Location: /");
        exit;
    } else {
        $response = "Не удалось войти!";
    }

    return $response;
}

function checkAuthWithCookie(){
    $result = false;

    if(isset($_COOKIE['id_user']) && isset($_COOKIE['cookie_hash'])){
        $db = getConnection();
        $sql = "select * from user where id_user = '".mysqli_real_escape_string($db, strip_tags($_COOKIE['id_user']))."'";
        $assocResult = getAssocResult($sql);
        mysqli_close($db);

        if(($assocResult[0]['password_user'] !== $_COOKIE['cookie_hash']) || ($assocResult[0]['id_user'] !== $_COOKIE['id_user'])){
            setcookie("id_user", "", time() - 3600*24*30*12, "/");
            setcookie("cookie_hash", "", time() - 3600*24*30*12, "/");
        }
        else{
            $_SESSION["user"] = $assocResult[0];
            header("Location: /");
        }

    }

    return $result;
}