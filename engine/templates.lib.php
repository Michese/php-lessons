<?php
$libs = scandir(ENGINE_DIR);

$libs = preg_grep('/^(.*)(\.lib)(\.php)$/', $libs);

foreach ($libs as $value) {
    require_once($value);
}