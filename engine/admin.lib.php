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

    $sql = "update cart set id_status = 2 where id_cart = $id_cart";
    $result = executeQuery($sql);

    if($result) {
        $response = [
            "result" => true,
            "name_new_status" => "Принят",
            "color_new_status" => "yellow"
        ];
    }

    return json_encode($response);
}

function cancelBuyProducts($id_cart) {
    $id_cart = (int)$id_cart;
    $result = false;
    $response = [
        "result" => false
    ];

    $sql = "update cart set id_status = 4 where id_cart = $id_cart";
    $result = executeQuery($sql);

    if($result) {
        $response = [
            "result" => true,
            "name_new_status" => "Отменен",
            "color_new_status" => "red",
        ];
    }

    return json_encode($response);
}