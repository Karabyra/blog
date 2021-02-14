<?php
include_once('functions.php');



$isSend = false;
$err = '';
$id = $_GET['id'];
$article = getArticles();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    editArticle($title,$content,$id);

    if($title === '' || $content === ''){
        $err = 'Заполните все поля!';
    }
    else if(mb_strlen($title, 'UTF8') < 2){
        $err = 'Имя не короче 2 символов!';
    }
    else{
        $dt = date("Y-d-m H:i:s");
        $isSend = true;
    }
}
else{
    $title = $article[$id]['title'];
    $content = $article[$id]['content'];
}

?>
<div class="form">
    <? if($isSend): ?>
        <p>Your massage edit!</p>
    <? else: ?>
        <form method="post">
            Title:<br>
            <input type="text" name="title" value="<?=$title?>"><br>
            Content:<br>
            <textarea name="content" style="width: 300px;height: 70px"><?=$content?></textarea><br>
            <button>Send</button>
            <p><?=$err?></p>
        </form>
    <? endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>