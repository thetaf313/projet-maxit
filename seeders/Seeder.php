<?php

namespace App\Seeders;

use PDO;
use PDOException;
use Exception;

class Seeder
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
            $this->insertRoles();
            $this->insertUsers();
            $this->seedDatabase();
            echo "✅ Base de données peuplée avec succès.\n";

        } catch (PDOException $e) {
            die("Erreur de seed: " . $e->getMessage());
        }
    }

    private function insertRoles()
    {
        $sql = "INSERT INTO roles (nom) VALUES ('client'), ('commercial')";
        $this->pdo->exec($sql);
        echo "Rôles insérés.\n";
    }

    private function insertUsers(): void
    {
        // Mot de passe hashé avec password_hash()
        $users = [
            [
                'nom' => 'Sow',
                'prenom' => 'Amina',
                'login' => '770000001',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
                'adresse' => 'Dakar, Médina',
                'cni' => '1000100010001',
                'photo_recto' => 'images/uploads/recto1.jpg',
                'photo_verso' => 'images/uploads/verso1.jpg',
                'role_id' => 1
            ],
            [
                'nom' => 'Diop',
                'prenom' => 'Ibrahima',
                'login' => '770000004',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
                'adresse' => 'Dakar, Liberté 6',
                'cni' => '1000100010002',
                'photo_recto' => 'images/uploads/recto2.jpg',
                'photo_verso' => 'images/uploads/verso2.jpg',
                'role_id' => 1
            ],
            [
                'nom' => 'Fall',
                'prenom' => 'Ndeye',
                'login' => '770000007',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
                'adresse' => 'Dakar, Plateau',
                'role_id' => 2
            ]
        ];

        $stmt = $this->pdo->prepare("
        INSERT INTO users (nom, prenom, login, password, adresse, numero_carte_identite, photo_identite_recto, photo_identite_verso, role_id)
        VALUES (:nom, :prenom, :login, :password, :adresse, :cni, :photo_recto, :photo_verso, :role_id)
    ");

        foreach ($users as $user) {
            $stmt->execute([
                ':nom' => $user['nom'],
                ':prenom' => $user['prenom'],
                ':login' => $user['login'],
                ':password' => $user['password'],
                ':adresse' => $user['adresse'],
                ':cni' => $user['cni'] ?? null,
                ':photo_recto' => $user['photo_recto'] ?? null,
                ':photo_verso' => $user['photo_verso'] ?? null,
                ':role_id' => $user['role_id'],
            ]);
        }

        echo "Utilisateurs insérés avec mot de passe sécurisé.\n";
    }



    private function seedDatabase()
    {
        $sql = match ($this->driver) {
            // database/insert_mysql.sql
            // database/insert_postgres.sql
            // remplacer les chemins par les chemins réels de vos fichiers SQL
            'mysql' => file_get_contents(__DIR__ . '/seeds/mysql.sql'),
            'pgsql' => file_get_contents(__DIR__ . '/seeds/postgres.sql'),
            default => throw new Exception("Driver non supporté: " . $this->driver),
        };
        $this->pdo->exec($sql);
    }
}
