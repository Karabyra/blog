<?php

	include_once('model/messages.php');
	include_once('model/logs.php');

$tags = getTegs();

$ip = $_SERVER['REMOTE_ADDR'];
$uri = $_SERVER["REQUEST_URI"];
$isSend = false;
$err = '';
$sql = "INSERT articles (id_tegs ,title, content)VALUES(:tgs, :ttl ,:cntnt)";
$params = ['ttl' => '', 'cntnt' => '', 'tgs' => '' ];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
   $params['ttl'] = trim($_POST['title']);
   $params['cntnt'] = trim($_POST['content']);
    $params['tgs'] = (int)$_POST['tags'];

    addRequest($sql,$params);

    if($params['ttl'] === '' || $params['cntnt'] === ''){
        $err = 'Заполните все поля!';
        addLogs($ip,$uri,$err);
    }
    else if(mb_strlen($params['ttl'], 'UTF8') < 2 || mb_strlen($params['cntnt'], 'UTF8') < 2){
        $err = 'Имя не короче 2 символов!';
        addLogs($ip,$uri,$err);
    }
    else{
        $isSend = true;
        addLogs($ip,$uri,$err);
    }
}

?>
<div class="form">
    <?php if($isSend): ?>
        <p>Your app is done!</p>
    <?php else: ?>
        <form method="post">
            Title:<br>
            <input type="text" name="title" value="<?=$params['ttl']?>"><br>
            Tags:<br>
            <select name="tags">
                <?php foreach ($tags as $tag):?>
                <option value="<?=$tag['id_tegs']?>">
                    <?=$tag['tegs']?>
                </option>
               <?php endforeach;?>
            </select><br>
            Content:<br>
            <textarea name="content" style="width: 300px;height: 70px"></textarea><br>
            <button>Send</button>
            <p><?=$err?></p>
        </form>
    <?php endif; ?>
</div>
<hr>
<a href="index.php">Move to main page</a>