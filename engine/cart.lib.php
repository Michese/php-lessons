<?php
function activeCart($action = "")
{
    $vars = [];
    if ($action !== "") {
        switch ($action) {
            case "remove":
                if (isset($_POST["id_cart"])) {
                    if (empty($_POST["quantity"])) {
                        $vars["response"] = delFromCart($_POST["id_cart"], 1);
                    } else {
                        $vars["response"] = delFromCart($_POST["id_cart"], $_POST["quantity"]);
                    }
                }
                break;
            case "add":
                if (isset($_POST["id_goods"])) {
                    if (empty($_POST["quantity"])) {
                        $vars["response"] = addToCart($_POST["id_goods"], 1);
                    } else {
                        $vars["response"] = addToCart($_POST["id_goods"], $_POST["quantity"]);
                    }
                }
                break;
            case "bought":
                $vars["response"] = boughtGoods($_POST["id_cart"]);
                break;
        }
    } else {
        $vars = ["title" => "Корзина",
            "render_cart_products" => getCartProducts()
        ];
    }

    return $vars;
}

function getCartProducts()
{
    $cartProducts = [];
    if (isset($_SESSION["user"])) {
        $sql = "select cart.id_goods, cart.id_cart, name_goods, src_small_goods, price_goods, quantity, color_status, cart.id_status, name_status, quantity * price_goods as summ 
    from cart 
    inner join goods on cart.id_goods = goods.id_goods
    inner join status on status.id_status = cart.id_status
    where id_user = " . $_SESSION["user"]['id_user'];
        $cartProducts = getAssocResult($sql);
        if (empty($cartProducts[0])) {
            $cartProducts = "Добавьте товары в корзину!";
        } else {
            foreach($cartProducts as $key => $value) {
                if(!empty($cartProducts[$key]) && $cartProducts[$key]["id_status"] == 2) {
                    $cartProducts[$key]["bought"] = "accept";
                } else {
                    $cartProducts[$key]["bought"] = "disabled";
                }
            }
        }
    } else {
        $cartProducts = "Авторизируйтесь!";
    }
//    $cartProducts[0]["bought"] = "disabled";
    return $cartProducts;
}

function addToCart($id_goods, $quantity = 1)
{
    $response = [
        "result" => false
    ];

    if (isset($_SESSION["user"])) {
        $id_goods = (int)$id_goods;
        $quantity = (int)$quantity;
        $result = false;

        $sql = "select * from cart where id_goods = $id_goods and id_user = " . $_SESSION["user"]["id_user"] . " order by id_status";
        $assocResult = getAssocResult($sql);
        $sql = "";

        if (empty($assocResult[0]) || $assocResult[0]["id_status"] != 1) {
            $sql = "insert into cart(id_goods, quantity, id_user) values ('$id_goods', '$quantity', '" . $_SESSION["user"]["id_user"] . "')";
            $result = executeQuery($sql);
        } else {
            $newQuantity = (int)$assocResult[0]["quantity"] + $quantity;
            $sql = "update cart set quantity = " . $newQuantity . " where id_cart = " . $assocResult[0]["id_cart"] . " and id_user = " . $_SESSION["user"]["id_user"];
            $result = executeQuery($sql);
        }

        if ($result) {
            $response["result"] = true;
        }
    }

    return json_encode($response);
}

function delFromCart($id_cart, $quantity = 1)
{
    $id_cart = (int)$id_cart;
    $quantity = (int)$quantity;
    $response = [
        "result" => false
    ];
    $result = false;

    $sql = "select * from cart where id_cart = $id_cart";
    $assocResult = getAssocResult($sql);
    $sql = "";

    if ($assocResult[0]["quantity"] <= $quantity) {
        $sql = "delete from cart where id_cart = " . $id_cart;
        $result = executeQuery($sql);
    } else {
        $newQuantity = $assocResult[0]["quantity"] - $quantity;
        $sql = "update cart set quantity = " . $newQuantity . " where id_cart = " . $id_cart;
        $result = executeQuery($sql);
//        $result = updateDB("cart", "quantity", $assocResult[0]["id_cart"], $newQuantity);
    }

    if ($result) {
        $response["result"] = $result;
    }

    return json_encode($response);
}

function boughtGoods($id_cart) {
    $id_cart = (int)$id_cart;
    $response = [
        "result" => false
    ];
    $result = false;

    $sql = "update cart set id_status = 3 where id_cart = $id_cart";
    $result = executeQuery($sql);

    if($result) {
        $response = [
            "result" => true,
            "name_new_status" => "Выполнено",
            "color_new_status" => "green",
            "id_new_status" => 3
        ];
    }

    return json_encode($response);
}