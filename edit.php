<?php
include_once('model/messages.php');



$isSend = false;
$err = '';
$id = $_GET['id'];
$sqlGetArticle = "SELECT * FROM  articles WHERE id_article = $id";
$article =  getArticles($sqlGetArticle);

$params = ['ttl' => '', 'cntnt' => ''];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $params['ttl'] = trim($_POST['title']);
    $params['cntnt'] = trim($_POST['content']);
    var_dump($params);
    $sqlUpdateArticle = "UPDATE articles SET title = :ttl,content = :cntnt WHERE id_article = $id ";
    addRequest($sqlUpdateArticle,$params);
    $isSend = true;
    if($params['ttl'] === '' || $params['cntnt'] === ''){
        $err = 'Заполните все поля!';
    }
    else if(mb_strlen($params['ttl'], 'UTF8') < 2 || mb_strlen($params['cntnt'], 'UTF8') < 2){
        $err = 'Имя не короче 2 символов!';
    }
}

?>
<div class="form">
    <?php if($isSend): ?>
        <p>Your massage edit!</p>
    <?php else: ?>
        <form method="post">
            Title:<br>
            <input type="text" name="title" value="<?=$article[0]['title']?>"><br>
            Content:<br>
            <textarea name="content" style="width: 500px;height: 100px"><?=$article[0]['content']?></textarea><br>
            <button>Send</button>
            <p><?=$err?></p>
        </form>
    <?php endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>