<?php
function activeGoods()
{
     return ["title" => "Товары", "render_products" => getGoods()];
}

function activeProduct() {
    $response = " ";
    if(isset($_POST["id_goods"])) {
        if(isset($_POST["quantity"]) && (int)$_POST["quantity"] > 0) {
            $response = addToCart($_POST["id_goods"], $_POST["quantity"]);
        } else {
            $response = addToCart($_POST["id_goods"]);
        }
    }
    return ["title" => "Страница товара", "response" => $response, "render_product" => getProduct($_GET["id_goods"])];
}

function getGoods()
{
    $sql = "select * from goods";
    $goods = getAssocResult($sql);
    return $goods;
}

function getProduct($id_goods)
{
    $id_goods = (int)$id_goods;
    $sql = "select * from goods where id_goods=" . $id_goods;
    $product = getAssocResult($sql);

    $result = [];
    if (isset($product[0])) {
        $result[0] = $product[0];
    }

    return $result;
}