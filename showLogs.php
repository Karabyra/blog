<?php
include_once ('model/logs.php');
$logs = getLogs();

$id = (int)($_GET['id'] ?? '');
$logs = $logs[$id] ?? null;
$hasPost = ($logs !== null);
?>
<div>
    <?if($hasPost):?>
        <p>Дата:<?=$logs['dt']?></p>
        <p>Ip address:<?=$logs['ip']?></p>
        <p>Uri address:<?=$logs['uri']?></p>
             <?if($logs['error']):?>
                <p style="color: red">Ошибка:<?=$logs['error']?></p>
             <? endif; ?>
    <? else: ?>
    <div class="e404">
        <h1>Страница не найдена!</h1>
    </div>
    <? endif; ?>
</div>
<a href="admin.php">admin</a>