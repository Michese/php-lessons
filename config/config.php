<?php
define('SITE_ROOT', "..");
define('WWW_ROOT', SITE_ROOT . '/public');

// db
define('HOST', 'localhost');
define('USER_DB', 'michese');
define('PASS_DB', '1234');
define('DB', 'trialdb');

define('DATA_DIR', SITE_ROOT . '/data');
define('ENGINE_DIR', SITE_ROOT . '/engine');
define('TPL_DIR', SITE_ROOT . '/templates');
define('IMG_DIR', SITE_ROOT . '/img');

define('SITE_TITLE', 'Урок 4');

require_once(ENGINE_DIR . '/functions.php');
require_once(ENGINE_DIR . '/db.php');
?>
