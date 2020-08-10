<?php
function activeReviews() {

    $vars["response"] = " ";
    if (isset($_SESSION["user"]) && isset($_POST["text"]) && $_POST["text"] !== "") {
        $vars["response"] = addReview($_SESSION["user"]["name_user"], $_POST["text"]);
    } else if(!isset($_SESSION["user"])) {
        $vars["response"] = "Авторизируйтесь!";
    }

    $vars["title"] = "Отзывы";
    if (empty(getReviews())) {
        $vars["reviews"] = "Добавьте первый отзыв";
    } else {
        $vars["reviews"] = getReviews();
    }
    return $vars;
}

function addReview($userName, $text)
{
    $result = false;
    $response = "Произошла ошибка, отзыв не добавлен.";

    $db = getConnection();
    $userName_string = mysqli_real_escape_string($db, (string)htmlspecialchars(strip_tags($userName)));
    $text_string = mysqli_real_escape_string($db, (string)htmlspecialchars(strip_tags($text)));

    $sql = "select id_reviews from reviews where user_name_reviews = '$userName_string' and text_reviews = '$text_string'";
    $assocResult = getAssocResult($sql);

    if(empty($assocResult)) {
        $sql = "insert into reviews (user_name_reviews, text_reviews) values ('$userName_string', '$text_string')";
        $result = executeQuery($sql, $db);
        if ($result) {
            $response = "Отзыв добавлен!";
        }
    }

    return $response;
}

function getReviews()
{
    $sql = "select * from reviews order by date_reviews desc";
    $result = getAssocResult($sql);
    return $result;
}