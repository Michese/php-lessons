<?php
function activeAccount()
{
    if (!isset($_SESSION["user"])) {
        header("Location: /");
        exit();
    }

    $vars["title"] = "Личный кабинет";
    $vars["admin_account"] = " ";
    $vars["render_cart_products"] = " ";
    $vars["user_data"] = getUserData();

    if($_SESSION["user"]["id_user"] == 1) {
        $vars["admin_account"] = "<script defer src='/js/adminAccount.js'></script>";
        $vars["render_cart_products"] = getCartProductsForAdmin();
    }

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

function getCartProductsForAdmin()
{
    $cartProducts = [];
    $sql = "select *, cart.quantity * goods.price_goods as summ from cart
inner join goods on goods.id_goods = cart.id_goods
inner join user on user.id_user = cart.id_user
inner join status on status.id_status = cart.id_status
order by cart.date_cart desc
";

    $assocResult = getAssocResult($sql);
    if (empty($assocResult[0])) {
        $cartProducts = "Нет товаров";
    } else {
        $cartProducts = $assocResult;
    }

    return $cartProducts;
}
