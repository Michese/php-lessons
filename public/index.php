<?php
require_once("../config/config.php");
//setGalleryTable();
$url_array = explode("/", $_SERVER['REQUEST_URI']);
// localhost/news/
// localhost/index/
// localhost/gallery/
// localhost/image/
//print_r($url_array);
if ($url_array[1] == "") {
    $page_name = "index";
} else {
    $page_name = $url_array[1];
}
//
//$page_name = "gallery";
//
$variables = prepareVariables($page_name);

echo renderPage($page_name, $variables);
?>
