<?php

function activeAdmin($action) {
    $vars = [];
    switch ($action) {
        case "accept":
            $vars["response"] = acceptBuyProducts($_POST["id_cart"]);
            break;
        case "cancel":
            $vars["response"] = cancelBuyProducts($_POST["id_cart"]);
            break;
    }
    return $vars;
}

function acceptBuyProducts($id_cart) {
    $id_cart = (int)$id_cart;
    $result = false;
    $response = [
        "result" => false
    ];

    $sql = "update cart set id_status = 2 where id_cart = $id_cart and id_status = 1";
    $result = executeQuery($sql);

    if($result) {
        $sql = "select status.name_status, status.color_status from cart
        inner join status on cart.id_status = status.id_status
        where cart.id_cart = $id_cart and cart.id_status = 2";
        $assocResult = getAssocResult($sql);

        if(!empty($assocResult[0])) {
            $response = [
                "result" => true,
                "name_new_status" => $assocResult[0]["name_status"],
                "color_new_status" => $assocResult[0]["color_status"]
            ];
        }
    }

    return json_encode($response);
}

function cancelBuyProducts($id_cart) {
    $id_cart = (int)$id_cart;
    $result = false;
    $response = [
        "result" => false
    ];

    $sql = "update cart set id_status = 4 where id_cart = $id_cart and id_status = 1";
    $result = executeQuery($sql);

    if($result) {
        $sql = "select status.name_status, status.color_status from cart
        inner join status on cart.id_status = status.id_status
        where cart.id_cart = $id_cart and cart.id_status = 4";
        $assocResult = getAssocResult($sql);

        if(!empty($assocResult[0])) {
            $response = [
                "result" => true,
                "name_new_status" => $assocResult[0]["name_status"],
                "color_new_status" => $assocResult[0]["color_status"]
            ];
        }
    }

    return json_encode($response);
}