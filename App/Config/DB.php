<?php

namespace App\Config;

class DB extends Params
{
    private static $instance;

    public static function getInstance()
    {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new \PDO('mysql:host=' . Params::HOST . ';dbname=' . Params::BASE, Params::USER, Params::PASS );
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        }
        } catch (\PDOException $e) {
           echo $e->getMessage();
        }
        return self::$instance;
    }

    public static function prepare($sql){
        return self::getInstance()->prepare($sql);
    }
}
