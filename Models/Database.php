<?php

namespace Models;
use PDO;
use PDOException;
use Source\Constant;


class Database
{
    protected static PDO $pdo;
   

    private function __construct()
    {
        try {
            static::$pdo = new PDO('mysql:host='.Constant::DB_HOST.';dbname='.Constant::DB_NAME,
            Constant::DB_USERNAME,
            Constant::DB_PASSWORD, 
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage(); die();
        }

    }

    protected function getPDO(): PDO
    {
        return static::$pdo;
    }
}