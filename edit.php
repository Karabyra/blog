<?php
include_once('model/messages.php');


$isSend = false;
$err = '';
$id = checkID($_GET['id']);
$article =  getOneArticles($id);
if($_SERVER['REQUEST_URI'] !== "/edit.php?id=$id") {
    $isSend = true;
}
$params = ['ttl' => '', 'cntnt' => ''];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $params['ttl'] = trim($_POST['title']);
    $params['cntnt'] = trim($_POST['content']);
    if($params['ttl'] === '' || $params['cntnt'] === ''){
        $err = 'Заполните все поля!';
    }
    else if(mb_strlen($params['ttl'], 'UTF8') < 2 || mb_strlen($params['cntnt'], 'UTF8') < 2){
        $err = 'Имя не короче 2 символов!';
    }
  else  {
      sqlUpdateArticle($id,$params);
      $isSend = true;
  }
}

?>
<div class="form">
    <?php if($isSend): ?>
        <p>Возникла ошибка</p>
    <?php else: ?>
        <form method="post">
            Title:<br>
            <input type="text" name="title" value="<?=$article['title']?>"><br>
            Content:<br>
            <textarea name="content" style="width: 500px;height: 100px"><?=$article['content']?></textarea><br>
            <button>Send</button>
            <p><?=$err?></p>
        </form>
    <?php endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>