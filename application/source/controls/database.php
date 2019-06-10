<?php

class Database{
    private static $databaseName = 'databaseName';
    private static $databaseHost = 'localhost';
    private static $databaseUsername = 'username';
    private static $databasePassword = 'password';

    private static $cont = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect(){
        if (null == self::$cont){
            try {
                self::$cont = new PDO ("mysql:host=".self::$databaseHost.";"."dbname=".self::$databaseName, self::$databaseUsername, self::$databasePassword);
            } catch (PDOException $e){
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect(){
        self::$cont = null;
    }
}

?>
