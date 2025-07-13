<?php

namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Entity\Compte;

class CompteRepository extends AbstractRepository {

    // private static ?CompteRepository $instance = null;

    public function __construct()
    {
        parent::__construct();
    }

    // public static function getInstance() {
    //     if (self::$instance == null) {
    //         self::$instance = new CompteRepository();
    //     }
    // }

    public function selectAll() {}

    public function insert($compte): ?int
    {
        $query = "INSERT INTO comptes (telephone, type_compte, solde, user_id) 
                  VALUES (:telephone, :type_compte, :solde, :user_id)";
        $params = [
            'telephone' => $compte->getTelephone(),
            'type_compte' => $compte->getTypeCompte()->value, // Assuming TypeCompte is a backed enum
            'solde' => $compte->getSolde(),
            'user_id' => $compte->getUser()->getId()
        ];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return (int)$this->pdo->lastInsertId();
    }

    public function update() {}
    public function delete() {}
    public function selectById() {}
    public function selectBy(array $filter) {}





    public function findAll(array $filter) : array {
        return [];
    }

    public function findById(): ?Compte {

        return null;
    }

    public function findByTelephone(string $telephone) {}

}