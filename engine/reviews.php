<?php
function activeReviews() {
    if (isset($_POST["name"]) && isset($_POST["text"]) && $_POST["name"] !== "" && $_POST["text"] !== "") {
        $vars["response"] = addReview($_POST["name"], $_POST["text"]);
    } else {
        $vars["response"] = " ";
    }

    $vars["title"] = "Отзывы";
    if (empty(getReviews())) {
        $vars["reviews"] = "Добавте первый отзыв";
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
    $sql = "select * from reviews";
    $result = getAssocResult($sql);
    return $result;
}