<?php
require_once("../config/config.php");
?>
<!doctype html>
<html lang="en">
<head>
    <!--    <meta charset="UTF-8">-->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= SITE_TITLE ?></title>
</head>
<body>
<main>
    <div class="products">
        <?=renderImages()?>
    </div>
</main>
</body>
</html>
