<?php
namespace App\Model;

use App\Core\Connection;

class User
{
    private $link;

    public function __construct()
    {
        $this->link = Connection::connect();    
    }

    public function getUserByEmail($email)
    {
        $result = $this->link->query("SELECT * FROM usuario WHERE email = '$email'");

        return $rows = (object) $result->fetch_assoc();
    }
}