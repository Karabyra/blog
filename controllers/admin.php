<?php
include_once('model/logs.php');
$arrayLogs = getLogs();

?>

<?php foreach ($arrayLogs as $id => $value):?>
    <a href="../showLogs.php?id=<?= $id?>">show  log: <?=$id?></a><br>
<?endforeach;?>
<hr>
<a href="index.php">Move to main page</a>

