<?php
namespace App\Core;

use mysqli;

abstract class Connection
{
    //Atributos
    private static $link;

    /** Conexão com Banco de Dados mysqli
     * @return self::link mysqli_object
     */
    public static function connect(): mysqli
    {
        self::$link = new mysqli("localhost", "root", "", "vendas");

        return self::$link;
    }
}
