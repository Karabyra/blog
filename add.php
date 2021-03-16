<?php

include_once('model/messages.php');
include_once('model/logs.php');
include_once('core/function.php');


$tags = getTegs();
$ip = $_SERVER['REMOTE_ADDR'];
$uri = $_SERVER["REQUEST_URI"];
$isSend = false;
$params = ['ttl' => '', 'cntnt' => '', 'tgs' => ''];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $params['ttl'] = trim($_POST['title']);
    $params['cntnt'] = trim($_POST['content']);
    $params['tgs'] = (int)$_POST['tags'];
    $errArray = paramsValidate($params);
    if (empty($errArray)) {
        addRequest($params);
        $isSend = true;
    }
} else {
    $errArray = [];
}

include('view/v_add.php');

