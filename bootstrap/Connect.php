<?php
use MongoDB\Client;
error_reporting(0);
//require autoload
require_once "vendor/autoload.php";
// khoi tao class Client
$conn = new Client("mongodb://127.0.0.1:27017");
//select database
$db = $conn->mongo;
//selection collection
$post = $db->users;
return $post;
?>