<?php

	include_once('model/messages.php');
	include_once ('model/logs.php');

$ip = $_SERVER['REMOTE_ADDR'];
$uri = $_SERVER["REQUEST_URI"];

$getId = $_GET['id'];

$sql = "DELETE FROM `articles` WHERE `articles`.`id_article` = $getId ";
var_dump($sql);
addRequest($sql);
$err = '';
addLogs($ip,$uri,$err);

?>
<p>message remove</p>
<hr>
<a href="index.php">Move to main page</a>