<?php

namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Entity\User;
use PDO;

class UserRepository extends AbstractRepository
{

    private static ?UserRepository $instance = null;

    public function __construct()
    {
        parent::__construct();
    }

    public static function getInstance(): UserRepository {
        if (self::$instance == null) {
            self::$instance = new UserRepository();
        }
        return self::$instance;
    }

    public function selectAll() {}

    public function insert($user): ?int
    {

        $query = "INSERT INTO users (prenom, nom, adresse, login, password, numero_carte_identite, photo_identite_recto, photo_identite_verso, role_id) 
                  VALUES (:prenom, :nom, :adresse, :login, :password, :numero_carte_identite, :photo_identite_recto, :photo_identite_verso, :role_id)";
        $params = [
            'prenom' => $user->getPrenom(),
            'nom' => $user->getNom(),
            'adresse' => $user->getAdresse(),
            'login' => $user->getLogin(),
            'password' => $user->getPassword(),
            'numero_carte_identite' => $user->getNin(),
            'photo_identite_recto' => $user->getPhotoRecto(),
            'photo_identite_verso' => $user->getPhotoVerso(),
            'role_id' => $user->getRole()->getId()
        ];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return (int)$this->pdo->lastInsertId();
    }

    public function update() {}
    public function delete() {}
    public function selectById() {}
    public function selectBy(array $filter) {}


    public function selectByLogin(string $login): ?User
    {
        $start = microtime(true);
        $query = 'SELECT * FROM users WHERE login = :login';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        error_log('Requête login exécutée en ' . (microtime(true) - $start) . 's');
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? User::toObject($row) : null;
    }

    public function exists(string $value) {
        $query = "SELECT COUNT(*) FROM users WHERE login = :value OR numero_carte_identite = :value";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    } 
}
