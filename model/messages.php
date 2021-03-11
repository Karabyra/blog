<?php
include_once ('model/db.php');

function getAllarticles(){
    $db = dbConnect();
    $query = $db->prepare("SELECT * FROM articles ORDER BY article_dt DESC");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function getTegs(){
    $db = dbConnect ();
    $query = $db ->prepare('SELECT * FROM tegs ');
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}
function getOneArticles(string $id){
    $db = dbConnect ();
    $query = $db ->prepare("SELECT * FROM  articles WHERE id_article = $id");
    $params = ['cid'=>$id];
    $query->execute($params);
    $result = $query->fetch();
    return $result;
}

function addRequest(string $sql , array $params = []){
    $db = dbConnect ();
    $query = $db -> prepare($sql);
    $query->execute($params);
}

function deleteArticle(string $id){
    $db = dbConnect ();
    $query = $db ->prepare("DELETE FROM `articles` WHERE `articles`.`id_article` = $id");
    $params = ['cid'=>$id];
    $query->execute($params);
}
function sqlUpdateArticle($id, array $params){
    $db = dbConnect ();
    $query = $db ->prepare("UPDATE articles SET title = :ttl,content = :cntnt WHERE id_article = $id");
    $query->execute($params);
}
function checkID($id){
    $arr = [];
    $checkOutID ='';
    $regex = '/^[1-9]+\d*/';
    preg_match($regex,$id,$arr);
    if (!empty($arr)){
        $checkOutID = $arr[0];
    }
    return $checkOutID;
}