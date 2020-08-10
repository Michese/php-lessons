<?php
require_once("../config/config.php");
session_start();

$url_array = explode("/", $_SERVER['REQUEST_URI']);

if ($url_array[1] == "") {
    $page_name = "index";
} else {
    $page_name = $url_array[1];
}

$action = "";
if(isset($url_array[2]) && $url_array[2] != "" && !preg_match("/^(\?)(.*)$/",$url_array[2])) {
    $action = $url_array[2];
}

$variables = prepareVariables($page_name, $action);
$isAjax = ($action == "")? false: true;

echo renderPage($page_name, $variables, $isAjax);