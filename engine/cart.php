<?php
function activeCart()
{
    $response = " ";
    if (isset($_POST["id_goods"])) {
        if (empty($_POST["quantity"])) {
            $response = delFromCart($_POST["id_goods"], 1);
        } else {
            $response = delFromCart($_POST["id_goods"], $_POST["quantity"]);
        }
    }
    return ["title" => "Корзина", "response" => $response, "render_cart_products" => getCartProducts()];
}

function getCartProducts()
{
    $sql = "select cart.id_goods, name_goods, src_small_goods, price_goods, quantity, quantity * price_goods as summ 
from cart inner join goods on cart.id_goods = goods.id_goods";
    $cartProducts = getAssocResult($sql);
    return $cartProducts;
}

function addToCart($id_goods, $quantity = 1)
{
    $id_goods = (int)$id_goods;
    $quantity = (int)$quantity;
    $result = false;
    $response = "Произошла ошибка!";

    $sql = "select * from cart where id_goods = " . $id_goods;
    $assocResult = getAssocResult($sql);
    $sql = "";

    if (empty($assocResult)) {
        $sql = "insert into cart(id_goods, quantity) values ('$id_goods', '$quantity')";
        $result = executeQuery($sql);
    } else {
        $newQuantity = (int)$assocResult[0]["quantity"] + $quantity;
        $result = updateDB("cart", "quantity", $assocResult[0]["id_cart"], $newQuantity);
    }

    if ($result) {
        $response = "Товар успешно добавлен в корзину!";
    }

    return $response;
}

function delFromCart($id_goods, $quantity = 1)
{
    $id_goods = (int)$id_goods;
    $quantity = (int)$quantity;
    $response = "Произошла ошибка!";
    $result = false;

    $sql = "select * from cart where id_goods = $id_goods";
    $assocResult = getAssocResult($sql);
    $sql = "";

    if ($assocResult[0]["quantity"] <= $quantity) {
        $sql = "delete from cart where id_cart = " . $assocResult[0]["id_cart"];
        $result = executeQuery($sql);
    } else {
        $newQuantity = $assocResult[0]["quantity"] - $quantity;
        $result = updateDB("cart", "quantity", $assocResult[0]["id_cart"], $newQuantity);
    }

    if ($result) {
        $response = "Товар успешно удален из корзины!";
    }

    return $response;
}