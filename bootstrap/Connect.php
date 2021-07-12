<?php
namespace Cn;
use MongoDB\Client;

class Connect
{
    public function connect()
    {
        $conn = new Client("mongodb://127.0.0.1:27017");
//select database
        $db = $conn->mongo;
//selection collection
        return $db->users;
    }
}

?>