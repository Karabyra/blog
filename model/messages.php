<?php
include_once ('model/db.php');
//index.php
$sqlAllArticles = "SELECT * FROM articles ORDER BY article_dt DESC";
//add.php
$sqlTags = 'SELECT * FROM tegs ';

function getArticles(string $sql, $isAll = true){

    $db = dbConnect();
    $query = $db->prepare($sql);
    $query->execute();
    if ($isAll) {
        $result = $query->fetchAll();
    } else {
        $result = $query->fetch();
    }

    return $result;
}

function addRequest(string $sql , array $params = []){
    $db = dbConnect ();
    $query = $db -> prepare($sql);
    $query->execute($params);
}
