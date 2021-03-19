<?php
include_once('core/route.php');

$cname = $_GET['c'] ?? 'index';
$path = "controllers/{$cname}.php";

if (validateAddressController($cname) && file_exists($path)) {
    include_once($path);
} else {
    header('HTTP/1.1 Not Found');
    include('view/v_404.php');
}

