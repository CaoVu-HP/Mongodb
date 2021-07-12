<?php

require 'vendor/autoload.php';
$connect = require_once __DIR__.'/bootstrap/Connect.php';

$app = new  App\Controllers\App();
$app->Call($connect);
?>