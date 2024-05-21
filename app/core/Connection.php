<?php
namespace App\Core;

use mysqli;

abstract class Connection
{
    private static $link;

    public static function connect()
    {
        self::$link = new mysqli("localhost", "root", "", "banco_tester");

        return self::$link;
    }
}
