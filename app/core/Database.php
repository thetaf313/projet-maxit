<?php

namespace App\Core;

use PDO;

class Database
{
    private static ?PDO $pdo = null;


    public static function getInstance(): PDO
    {
        if (self::$pdo === null) {
            
            $host = DB_HOST;
            $port = DB_PORT;
            $dbname = DB_NAME;
            $user = DB_USER;
            $pass = DB_PASS;

            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
            self::$pdo = new PDO($dsn, $user, $pass);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }

        // error_log('connexion reussie');
        return self::$pdo;
    }
}
