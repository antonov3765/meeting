<?php

require_once(ROOT . '/config/db.php');

class DB
{
    private static $pdo = null;
    private static function pdo()
    {
        if(self::$pdo ==null)
        {
            $connString = 'mysql:host='.DB_HOST. ";dbname=". DB_NAME. ';charset=' .DB_CHARSET ;

            $options =[
                    PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES=>false,
            ];

            self::$pdo= new PDO($connString, DB_USERNAME, DB_PASS, $options);
        }
        return self::$pdo;
    }

    public static function run($sql,$args = [])
    {
        $stmt = self::pdo()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}