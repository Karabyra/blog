<?php
include_once('model/messages.php');


$isSend = false;
$id = checkID($_GET['id']);
var_dump($id);
$article = getOneArticles($id);
$params = ['ttl' => '', 'cntnt' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params['ttl'] = trim($_POST['title']);
    $params['cntnt'] = trim($_POST['content']);
    $params['cid'] = (int)$id;
    $errArray = paramsValidate($params);
    if (empty($errArray)) {
        sqlUpdateArticle($id, $params);
        $isSend = true;
    }
} else {
    $errArray = [];
}
include('view/v_edit.php');