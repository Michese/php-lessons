<?php
header('Content-Type: charset=utf-8');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php-lesson</title>
</head>
<body>
<main>
    <div class="phpCode">
        <h1>task 1</h1>
        <p>
            <?php
            $n = 0;
            while ($n <= 100) {
                if ($n % 3 === 0) {
                    echo $n . ' ';
                }
                $n++;
            }
            ?>
        </p>
        <h1>task 2</h1>
        <p>
            <?php
            $n = 0;
            do {
                if ($n === 0) {
                    echo $n . " - нуль.<br>";
                } else if ($n % 2 === 0) {
                    echo $n . " - четное число.<br>";
                } else {
                    echo $n . " - нечетное число.<br>";
                }

                $n++;
            } while ($n <= 10);
            ?>
        </p>
        <h1>task 3</h1>
        <ol>
            <?php
            $area = [
                "Тамбовская область" => [
                    "Тамбов",
                    "Котовск",
                    "Сосновка"
                ],
                "Липецкая область" => [
                    "Липецк",
                    "Грязи",
                    "Доброе"
                ],
                "Московская область" => [
                    "Москва",
                    "Подольск",
                    "Зеленоград"
                ],
                "Тверская область" => [
                    "Тверь",
                    "Кувшиново"
                ]
            ];
            foreach ($area as $key => $value) {
                echo "<li> $key:<br>";
                echo implode(', ', $value);
            }
            ?>
        </ol>
        <h1>task 4</h1>
        <form action="/" method="get" class="form">
            <textarea name="textTask4" rows="6" cols="50" placeholder="Введите текст для перевода"></textarea>
            <input type="submit" value="Перевод">
        </form>

        <p>
            <?php
            $alphabet = [
                'а' => 'a',
                'б' => 'b',
                'в' => 'v',
                'г' => 'g',
                'д' => 'd',
                'е' => 'e',
                'ё' => 'yo',
                'ж' => 'zh',
                'з' => 'z',
                'и' => 'i',
                'й' => 'yi',
                'к' => 'k',
                'л' => 'l',
                'м' => 'm',
                'н' => 'n',
                'о' => 'o',
                'п' => 'p',
                'р' => 'r',
                'с' => 's',
                'т' => 't',
                'у' => 'u',
                'ф' => 'f',
                'х' => 'kh',
                'ц' => 'tc',
                'ч' => 'ch',
                'ш' => 'sh',
                'щ' => 'shch',
                'ъ' => "'",
                'ы' => 'y',
                'ь' => "\"",
                'э' => 'e',
                'ю' => 'yu',
                'я' => 'ya',
                'А' => 'A',
                'Б' => 'B',
                'В' => 'V',
                'Г' => 'G',
                'Д' => 'D',
                'Е' => 'E',
                'Ё' => 'Yo',
                'Ж' => 'Zh',
                'З' => 'Z',
                'И' => 'I',
                'Й' => 'Yi',
                'К' => 'K',
                'Л' => 'L',
                'М' => 'M',
                'Н' => 'N',
                'О' => 'O',
                'П' => 'P',
                'Р' => 'R',
                'С' => 'S',
                'Т' => 'T',
                'У' => 'U',
                'Ф' => 'F',
                'Х' => 'Kh',
                'Ц' => 'Tc',
                'Ч' => 'Ch',
                'Ш' => 'Sh',
                'Щ' => 'Shch',
                'Ъ' => "'",
                'Ы' => 'Y',
                'Ь' => "\"",
                'Э' => 'E',
                'Ю' => 'Yu',
                'Я' => 'Ya'
            ];
            // Функцию взял отсюда https://www.php.net/manual/ru/function.str-split.php
            function str_split_unicode($str, $l = 0)
            {
                if ($l > 0) {
                    $ret = array();
                    $len = mb_strlen($str, "UTF-8");
                    for ($i = 0; $i < $len; $i += $l) {
                        $ret[] = mb_substr($str, $i, $l, "UTF-8");
                    }
                    return $ret;
                }
                return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
            }

            function translitString($str, $alphabet)
            {
                $letters = str_split_unicode($str);
                $newStr = '';
                for ($i = 0; $i < count($letters); $i++) {
                    if (array_key_exists($letters[$i], $alphabet)) {
                        $newStr .= $alphabet[$letters[$i]];
                    } else {
                        $newStr .= $letters[$i];
                    }
                }
                return $newStr;
            }

            if(isset($_GET["textTask4"])) {
                $str = trim($_GET["textTask4"]);
                echo translitString($str, $alphabet);
            }

            ?>
        </p>
        <h1>task 5</h1>
        <form action="/" method="get" class="form">
            <textarea name="textTask5" rows="6" cols="50" placeholder="Введите текст"></textarea>
            <input type="submit" value="Отправить">
        </form>
        <p>
            <?php
            function withoutSpaces($str)
            {
                return implode("_", explode(" ", $str));
            }

            if (isset($_GET["textTask5"])) {
                $str = $_GET["textTask5"];
                echo withoutSpaces($str);
            }
            ?>
        </p>
        <h1>task 6</h1>
        <?php
        echo "<ul>";
        foreach ($area as $key => $value) {
            echo "<li>" . $key . ":<ul>";
            foreach ($value as $value2) {
                echo "<li>" . $value2 . "</li>";
            }
            echo "</ul></li>";
        }
        echo "</ul>";
        ?>
        <h1>task 7</h1>
        <p>
            <?php
            for ($i = 0; $i < 10; print($i++ . " ")) {
            }
            ?>
        </p>
        <h1>task 8</h1>
        <?php
        $k = 'К';
        echo "<ol>";
        foreach ($area as $key => $value) {
            echo "<li>" . $key . ":<br>";
            $arr = [];
            foreach ($value as $value2) {
                $letters = str_split_unicode($value2);
                if ($letters[0] == 'К') {
                    $arr[] = $value2;
                }
            }
            echo implode(', ', $arr) . "</li>";
            unset($arr);
        }
        echo "</ol>";
        ?>
        <h1>task 9</h1>
        <form action="/" method="get" class="form">
            <textarea name="textTask8" cols="50" rows="6"></textarea>
            <input type="submit" value="Отправить">
        </form>
        <p>
            <?php
            function translitStringWithoutSpaces($str, $alphabet)
            {
                $str = implode("_", explode(" ", $str));
                $letters = str_split_unicode($str);
                $newStr = '';
                for ($i = 0; $i < count($letters); $i++) {
                    if (array_key_exists($letters[$i], $alphabet)) {
                        $newStr .= $alphabet[$letters[$i]];
                    } else {
                        $newStr .= $letters[$i];
                    }
                }
                return $newStr;
            }

            if(isset($_GET["textTask8"])) {
                $str = $_GET["textTask8"];
                echo translitStringWithoutSpaces($str, $alphabet);
            }
            ?>
        </p>
    </div>
</main>
<footer></footer>
</body>
</html>