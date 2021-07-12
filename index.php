<?php

require 'vendor/autoload.php';
$connect = new Cn\Connect();
$app = new  App\Controllers\App();
$app->Call($connect->connect());
?>