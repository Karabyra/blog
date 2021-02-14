<?php

	include_once('functions.php');
	include_once('model/logs.php');


$ip = $_SERVER['REMOTE_ADDR'];
$uri = $_SERVER["REQUEST_URI"];
$isSend = false;
$err = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    addArticle($title,$content);

    if($title === '' || $content === ''){
        $err = 'Заполните все поля!';
        addLogs($ip,$uri,$err);
    }
    else if(mb_strlen($title, 'UTF8') < 2){
        $err = 'Имя не короче 2 символов!';
        addLogs($ip,$uri,$err);
    }
    else{
        $isSend = true;
        addLogs($ip,$uri,$err);
    }
}
else{
    $title = '';
    $content = '';
}

?>
<div class="form">
    <? if($isSend): ?>
        <p>Your app is done!</p>
    <? else: ?>
        <form method="post">
            Title:<br>
            <input type="text" name="title" value="<?=$title?>"><br>
            Content:<br>
            <textarea name="content" style="width: 300px;height: 70px"></textarea><br>
            <button>Send</button>
            <p><?=$err?></p>
        </form>
    <? endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>