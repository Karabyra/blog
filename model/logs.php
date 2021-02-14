<?php

function getLogs(){
    $lines = file('logs/logs.txt');
    $logs = [];

    foreach ($lines as $line){
        $logs[] = strToArr($line);
    }

    return $logs;
}

function strToArr($str){
    $str = rtrim($str);
    $part = explode(';',$str);
    return ['dt' => $part[0],'ip'=>$part[1],'uri'=>$part[2],'error'=>$part[3]];

}

function addLogs($ip,$uri,$err){
    $dt  = date("Y-b-m H:i:s");
    $logs = "$dt;$ip;$uri;$err\n";
    file_put_contents('logs/logs.txt',$logs,FILE_APPEND);
    return true;
}





