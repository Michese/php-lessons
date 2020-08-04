<?php
function activeAccount()
{
    if (!isset($_SESSION["user"])) {
        header("Location: /");
        exit();
    }

    $vars["title"] = "Личный кабинет";
    $vars["user_data"] = getUserData();
    return $vars;
}

function getUserData()
{
    $sql = "select name_user, login_user from user where id_user = " . $_SESSION["user"]["id_user"];
    $assocResult = getAssocResult($sql);

    $result = [];
    if (isset($assocResult[0])) {
        $result[0] = $assocResult[0];
    }

    return $result;
}
