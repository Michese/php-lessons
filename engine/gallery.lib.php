<?php

function activeGallery()
{
    return ["title" => "Галлерея", "render_image" => getGallery()];
}

function activeImage($action)
{
    setIncrementViewsImage($_GET["id_gallery"]);
//    $content = getImage($_GET["id_gallery"]);
//    return [
//        "dir_gallery" => $content[0]["dir_gallery"],
//        "name_gallery" => $content[0]["name_gallery"],
//        "views_gallery" => $content[0]["views_gallery"]
//    ];
    return ["big_image" => getImage($_GET["id_gallery"])];
}

function getGallery()
{
    $sql = "SELECT * FROM gallery order by views_gallery desc";
    $gallery = getAssocResult($sql);
    return $gallery;
}

function setIncrementViewsImage($id_image)
{
    $id_image = (int)$id_image;
    $sql = "SELECT name_gallery, dir_gallery, views_gallery FROM gallery WHERE id_gallery = " . $id_image;
    $image = getAssocResult($sql);
    $value = $image[0]["views_gallery"] + 1;
    updateDB("gallery", "views_gallery", $id_image, $value);
}

function getImage($id_image)
{
    $id_image = (int)$id_image;

    $sql = "SELECT name_gallery, dir_gallery, views_gallery FROM gallery WHERE id_gallery = " . $id_image;
    $image = getAssocResult($sql);

    $result = [];
    if (isset($image[0]))
        $result[0] = $image[0];

    return $result;
}