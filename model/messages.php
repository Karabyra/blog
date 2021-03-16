<?php
include_once('core/db.php');

function getAllarticles()
{
    $db = dbConnect();
    $query = $db->prepare("SELECT * FROM articles ORDER BY article_dt DESC");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function getTegs()
{
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM tegs ');
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

function getOneArticles(string $id)
{
    $db = dbConnect();
    $query = $db->prepare("SELECT * FROM  articles WHERE id_article = :cid");
    $params = ['cid' => $id];
    $query->execute($params);
    $result = $query->fetch();
    return $result;
}

function addRequest(array $params = [])
{
    $db = dbConnect();
    $query = $db->prepare("INSERT articles (id_tegs ,title, content)VALUES(:tgs, :ttl ,:cntnt)");
    $query->execute($params);
}

function deleteArticle(string $id)
{
    $db = dbConnect();
    $query = $db->prepare("DELETE FROM `articles` WHERE `articles`.`id_article` =:cid");
    $params = ['cid' => $id];
    $query->execute($params);
}

function sqlUpdateArticle($id, array $params)
{
    $db = dbConnect();
    $query = $db->prepare("UPDATE articles SET title = :ttl,content = :cntnt WHERE id_article = :cid");
    $query->execute($params);
}

function checkID($id)
{
    $arr = [];
    $checkOutID = '';
    $regex = '/^[1-9]+\d*/';
    preg_match($regex, $id, $arr);
    if (!empty($arr)) {
        $checkOutID = $arr[0];
    }
    return $checkOutID;
}

function paramsValidate(array $params):array
{
    $err = [];
    $id = checkID($_GET['id']);

    if ($_SERVER['REQUEST_URI'] !== "/edit.php?id=$id" && $_SERVER['REQUEST_URI'] !== "/add.php") {
        $err[] = 'Ошибка Id адресса';
    }
    else if ($params['ttl'] === '' || $params['cntnt'] === '') {
        $err[] = 'Заполните все поля!';
    } else if (mb_strlen($params['ttl'], 'UTF8') < 2 || mb_strlen($params['cntnt'], 'UTF8') < 2) {
        $err[] = 'текст не короче 2 символов!';
    }
    return $err;
}