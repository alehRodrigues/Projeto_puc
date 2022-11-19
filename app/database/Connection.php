<?php
namespace app\database;

use PDO;

class Connection {

    private static $connection = null;

    public static function getConnection() {
        if (self::$connection == null) {
            self::$connection = 
            new PDO(
                'mysql:host=localhost;dbname=coisas_emprestadas', 'root', 'root',
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
        }
        return self::$connection;
    }

}