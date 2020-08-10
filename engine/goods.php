<?php
function activeGoods() {
    $vars = [];
    $vars["title"] = "Товары";
    $vars["render_products"] = getGoods();
    return $vars;
}
function getGoods() {
    $sql = "select * from goods";
    $goods = getAssocResult($sql);
    return $goods;
}

function getProduct($id_goods) {
    $id_goods = (int)$id_goods;
    $sql = "select * from goods where id_goods=".$id_goods;
    $product = getAssocResult($sql);

    $result = [];
    if(isset($product[0])){
        $result[0] = $product[0];
    }

    return $result;
}
?>