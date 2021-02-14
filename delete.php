<?php

	include_once('functions.php');
	include_once ('model/logs.php');

$ip = $_SERVER['REMOTE_ADDR'];
$uri = $_SERVER["REQUEST_URI"];

$getId = $_GET['id'];
removeArticle($getId);
$err = '';
addLogs($ip,$uri,$err);

?>
<p>message remove</p>
<hr>
<a href="index.php">Move to main page</a>