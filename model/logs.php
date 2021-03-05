<?php

function getLogs(){
    $lines = file('db/logs/logs.txt');
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

function addLogs(int $ip,string $uri,string $err =''){
    try{
        $dt  = date("Y-d-m H:i:s");
        $logContent = "{$dt};{$ip};{$uri};{$err};";
        $logContent .= PHP_EOL;

        $logFilePath = 'db/logs/logs.txt';
        $logFile = fopen($logFilePath,'a+');
        fwrite($logFile,$logContent);
        fclose($logFile);
    } catch (\Exception $e){
        return false;
    }
    return  true;
}






