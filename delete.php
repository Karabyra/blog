<?php

	include_once('model/messages.php');
	include_once ('model/logs.php');

$ip = $_SERVER['REMOTE_ADDR'];
$uri = $_SERVER["REQUEST_URI"];

$id = $_GET['id'];
$checkOutID = checkID($id);
deleteArticle($checkOutID);
$err = '';
addLogs($ip,$uri,$err);

?>
<p>message remove</p>
<hr>
<a href="index.php">Move to main page</a>