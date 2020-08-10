<?php

//Константы ошибок
define('ERROR_NOT_FOUND', 1);
define('ERROR_TEMPLATE_EMPTY', 2);

/*
* Обрабатывает указанный шаблон, подставляя нужные переменные
*/
function renderPage($page_name, $variables = [], $isAjax = false)
{
    $fullResult = null;
    if (!$isAjax) {
        $file = TPL_DIR . "/" . $page_name . ".tpl";

        if (!is_file($file)) {
            echo 'Template file "' . $file . '" not found';
            exit(ERROR_NOT_FOUND);
        }

        if (filesize($file) === 0) {
            echo 'Template file "' . $file . '" is empty';
            exit(ERROR_TEMPLATE_EMPTY);
        }

        $templateContent = file_get_contents($file);
        // если переменных для подстановки не указано, просто
        // возвращаем шаблон как есть
        if (!empty($variables)) {
            $templateContent = pasteValues($variables, $page_name, $templateContent);
        }

        if (!strstr($page_name, "_block")) {
            $skeleton = file_get_contents(TPL_DIR . "/skeleton.tpl");
            $variables["tplcontent"] = $templateContent;
            $templateContent = pasteValues($variables, $page_name, $skeleton);
        }

        $fullResult = $templateContent;
    } else {
        $fullResult = $variables["response"];
    }

    return $fullResult;
}

function pasteValues($variables, $page_name, $templateContent)
{
    foreach ($variables as $key => $value) {
        if ($value != null) {
            // собираем ключи
            $p_key = '{{' . strtoupper($key) . '}}';

            if (is_array($value)) {
                // замена массивом
                $result = "";
                foreach ($value as $value_key => $item) {
                    $itemTemplateContent = file_get_contents(TPL_DIR . "/" . $page_name . "_" . $key . "_item.tpl");

                    foreach ($item as $item_key => $item_value) {
                        $i_key = '{{' . strtoupper($item_key) . '}}';

                        $itemTemplateContent = str_replace($i_key, $item_value, $itemTemplateContent);
                    }

                    $result .= $itemTemplateContent;
                }
            } else
                $result = $value;

            $templateContent = str_replace($p_key, $result, $templateContent);
        }
    }

    return $templateContent;
}

function prepareVariables($page_name, $action = "")
{
    $vars = [
        "title" => SITE_TITLE,
        "logout" => " "
    ];

    $footerVars["year"] = date('Y');
    $headerVars["render_menu_link"] = getMainMenu();

    $vars["header_block"] = renderPage("header_block", $headerVars);
    $vars["footer_block"] = renderPage("footer_block", $footerVars);


    $functionName = "active" . ucfirst($page_name);
    if (!function_exists($functionName)) {
        throw new Exception("Не существует такой функции: " . $functionName);
    }

    $result = $functionName($action);
    $vars = array_merge($vars, $result);

    return $vars;
}

function getMainMenu()
{
    $vars = [
        [
            "link" => "index",
            "link_title" => "Главная"
        ],
        [
            "link" => "gallery",
            "link_title" => "Галлерея"
        ],
        [
            "link" => "goods",
            "link_title" => "Товары"
        ],
        [
            "link" => "cart",
            "link_title" => "Корзина"
        ],
        [
            "link" => "reviews",
            "link_title" => "Отзывы"
        ]
    ];

    $logout = [];
    if (isset($_SESSION["user"])) {
        $logout = [
            [
                "link" => "account",
                "link_title" => "Личный кабинет"
            ],
            [
                "link" => "logout",
                "link_title" => "Выйти"
            ]
        ];
    } else {
        $logout = [
            [
                "link" => "register",
                "link_title" => "Войти"
            ]
        ];
    }

    $vars = array_merge(
        $vars,
        $logout
    );
    return $vars;
}

function _log($s, $suffix = '')
{
    if (is_array($s) || is_object($s)) $s = print_r($s, 1);
    $s = "### " . date("d.m.Y H:i:s") . "\r\n" . $s . "\r\n\r\n\r\n";

    if (mb_strlen($suffix))
        $suffix = "_" . $suffix;

    _writeToFile($_SERVER['DOCUMENT_ROOT'] . "/_log/logs" . $suffix . ".log", $s, "a+");

    return $s;
}

function _writeToFile($fileName, $content, $mode = "w")
{
    $dir = mb_substr($fileName, 0, strrpos($fileName, "/"));
    if (!is_dir($dir)) {
        _makeDir($dir);
    }

    if ($mode != "r") {
        $fh = fopen($fileName, $mode);
        if (fwrite($fh, $content)) {
            fclose($fh);
            @chmod($fileName, 0644);
            return true;
        }
    }

    return false;
}

function _makeDir($dir, $is_root = true, $root = '')
{
    $dir = rtrim($dir, "/");
    if (is_dir($dir)) return true;
    if (mb_strlen($dir) <= mb_strlen($_SERVER['DOCUMENT_ROOT']))
        return true;
    if (str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir) == $dir)
        return true;

    if ($is_root) {
        $dir = str_replace($_SERVER['DOCUMENT_ROOT'], '', $dir);
        $root = $_SERVER['DOCUMENT_ROOT'];
    }
    $dir_parts = explode("/", $dir);

    foreach ($dir_parts as $step => $value) {
        if ($value != '') {
            $root = $root . "/" . $value;
            if (!is_dir($root)) {
                mkdir($root, 0755);
                chmod($root, 0755);
            }
        }
    }
    return $root;
}