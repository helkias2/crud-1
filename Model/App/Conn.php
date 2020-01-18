<?php

namespace Model\App;

class Conn{
    private static $db;
    public static function getConn(){
            if(!isset(self::$db)){
                self::$db = new \PDO("mysql:host=localhost;dbname=pdo;charset=utf8","root","root");
            }
            return self::$db;
    }

}