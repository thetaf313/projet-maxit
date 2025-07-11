<?php

namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Entity\User;
use PDO;

class UserRepository extends AbstractRepository {

    // private static ?UserRepository $instance = null;

    public function __construct()
    {
        parent::__construct();
    }

    // public static function getInstance() {
    //     if (self::$instance == null) {
    //         self::$instance = new UserRepository();
    //     }
    //     return self::$instance;
    // }

    public function selectAll() {}
    public function insert() {}
    public function update() {}
    public function delete() {}
    public function selectById() {}
    public function selectBy(array $filter) {}


    public function selectByLogin(string $login): ?User
    {
        $start = microtime(true);
        $query = 'SELECT * FROM personne WHERE login = :login';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        error_log('Requête login exécutée en ' . (microtime(true) - $start) . 's');
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? User::toObject($row) : null;
    }


}