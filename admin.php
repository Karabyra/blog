<?php
include_once ('model/logs.php');
$arrayLogs = getLogs();

?>

<?for($i = 0;$i < count($arrayLogs);$i++):?>
    <a href="showLogs.php?id=<?=$i?>">show  log: <?=$i?></a><br>
<?endfor?>
<hr>
<a href="index.php">Move to main page</a>

