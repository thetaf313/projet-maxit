<?php
namespace App\Migrations;
use PDO;
use PDOException;
use Exception;

class Migration
{
    private PDO $pdo;
    private string $driver;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->driver = $this->pdo->getAttribute(PDO::ATTR_DRIVER_NAME);
    }

    public function run()
    {
        try {

            $this->createDatabase();
            $this->createDbObjects();
        } catch (PDOException $e) {
            die("Erreur de migration: " . $e->getMessage());
        }
    }

    private function createDatabase()
    {
        if ($this->driver === 'mysql') {
            $this->pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
            $this->pdo->exec("USE " . DB_NAME);
        } elseif ($this->driver === 'pgsql') {
            try {
                $adminPdo = new PDO(
                    "pgsql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=postgres",
                    DB_USER,
                    DB_PASS,
                    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                );

                // Version PostgreSQL-compatible du IF NOT EXISTS
                $stmt = $adminPdo->prepare("SELECT 1 FROM pg_database WHERE datname = :dbname");
                $stmt->execute([':dbname' => DB_NAME]);

                if ($stmt->fetch()) {
                    echo "La base de données '" . DB_NAME . "' existe déjà.\n";
                } else {
                    // Création de la base
                    $adminPdo->exec("CREATE DATABASE " . DB_NAME);
                    echo "Base de données '" . DB_NAME . "' créée avec succès.\n";
                }
            } catch (PDOException $e) {
                // Si la base existe déjà, on continue
                if (strpos($e->getMessage(), 'already exists') === false) {
                    throw $e;
                }
            }
        }
    }

    private function createDbObjects()
    {
        $sql = match ($this->driver) {
            'mysql' => file_get_contents(__DIR__ . '/sql/mysql_schema.sql'),
            'pgsql' => file_get_contents(__DIR__ . '/sql/postgres_schema.sql'),
            default => throw new Exception("Driver non supporté : " . $this->driver),
        };
        $this->pdo->exec($sql);
    }
}
