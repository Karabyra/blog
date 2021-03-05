<?php

function dbConnect () :PDO{
    static $db;
    if($db === null){
        $db = new PDO('mysql:host=localhost;dbname=leson;charset=utf8', 'root', 'root',[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    return $db;
}

