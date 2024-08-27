<?php

namespace App\Core;
use PDO;

class Model extends \App\Core\Config
{
    public static function getDB()
    {
        static $db = null;

        if ($db === null) {
			$attributes = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
			try{
				$db = new PDO(Config::DB_TYPE . ':host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=' . Config::DB_CHARSET, Config::DB_USER, Config::DB_PASS, $attributes);
			}catch(PDOException $e)
			{
				echo $e->getMessage();
			}
        }
        return $db;
    }
}
