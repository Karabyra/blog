<?php
include_once('model/logs.php');
$logs = getLogs();
$id = (int)($_GET['id'] ?? '');
$logs = $logs[$id] ?? null;
$hasPost = ($logs !== null);
?>
<div>
    <?php if ($hasPost): ?>
        <p>Дата:<?= $logs['dt'] ?></p>
        <p>Ip address:<?= $logs['ip'] ?></p>
        <p>Uri address:<?= $logs['uri'] ?></p>
        <?php if ($logs['error']): ?>
            <p style="color: red">Ошибка:<?= $logs['error'] ?></p>
        <? endif; ?>
    <?php else: ?>
        <div class="e404">
            <h1>Страница не найдена!</h1>
        </div>
    <?php endif; ?>
</div>
<a href="controllers/admin.php">admin</a>