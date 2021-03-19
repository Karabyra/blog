<?php
include_once('model/messages.php');


$isSend = false;
$id = checkID($_GET['id']);
$article = getOneArticles($id);
$params = ['ttl' => '', 'cntnt' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params['ttl'] = trim($_POST['title']);
    $params['cntnt'] = trim($_POST['content']);
    $params['cid'] = (int)$id;
    $params = paramsSpecialChars($params);
    $errArray = paramsValidate($params);
    if (empty($errArray)) {
        sqlUpdateArticle($id, $params);
        $isSend = true;
    }
} else {
    $errArray = [];
}
if($errArray['404']){
    include('view/v_404.php');
}
else {
    header('HTTP/1.1 Not Found');
    include('view/v_edit.php');
}