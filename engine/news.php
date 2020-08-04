<?php
function activeNews() {
    return ["newsfeed" => getNews(), "test" => 123];
}

function activeNewspage() {
    $content = getNewsContent($_GET['id_news']);
    return ["news_title" => $content["news_title"], "news_content" => $content["news_content"]];
}

function getNews()
{
//    $sql = "select * from news";
//    $news = getAssocResult($sql);
    $news = selectDB('gallery');
    return $news;
}

function getNewsContent($id_news)
{
    $id_news = (int)$id_news;

    $sql = "SELECT * FROM news WHERE id_news = " . $id_news;
    $news = getAssocResult($sql);

    $result = [];
    if (isset($news[0]))
        $result[0] = $news[0];

    return $result;
}