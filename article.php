<?php

include_once('model/messages.php');
$id = (int)$_GET['id'] ?? '';
$checkOutID = checkID($id);
$hasPost = '';
if ($_SERVER['REQUEST_URI'] === "/article.php?id=$checkOutID") {
    $articles = getOneArticles($checkOutID);
    $post = $articles ?? null;
    $hasPost = ($post !== null);
}
include('view/v_article.php');