<?php

namespace App\Core;

use Exception;
use PDO;
use PDOException;

class Database
{
    private static ?PDO $pdo = null;

    public static function getInstance(): PDO
    {
        try {

            if (self::$pdo === null) {
                self::$pdo = new PDO(DSN, DB_USER, DB_PASS);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }

            return self::$pdo;
            
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        } catch (Exception $e) {
            die("Erreur inconnue : " . $e->getMessage());
        }
    }
}
