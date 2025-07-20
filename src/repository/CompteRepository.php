<?php

namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Entity\Compte;
use App\Entity\User;

class CompteRepository extends AbstractRepository
{

    private static ?CompteRepository $instance = null;

    private function __construct()
    {
        parent::__construct();
    }

    public static function getInstance(): CompteRepository {
        if (self::$instance == null) {
            self::$instance = new CompteRepository();
        }
        return self::$instance;
    }

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


    public function selectPrincipalByUser(User $user): ?Compte
    {
        $query = "SELECT * FROM comptes WHERE user_id = :user_id AND type_compte = 'Principal'";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['user_id' => $user->getId()]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            $compte = Compte::toObject($row);
            return $compte;
        }
        return null;
    }

    public function selectSecondairesByUser(User $user): array
    {
        $query = "SELECT * FROM comptes WHERE user_id = :user_id AND type_compte = 'Secondaire'";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['user_id' => $user->getId()]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return array_map(fn($row) => Compte::toObject($row), $rows);
    }

    public function updateTypeCompteByUser(User $user, string $typeCompte): bool
    {
        $query = "UPDATE comptes SET type_compte = :type_compte WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':type_compte' => $typeCompte,
            ':user_id' => $user->getId()
        ]);
    }

    public function updateToPrincipal($compte) {
        $query = "UPDATE comptes SET type_compte = :type_compte WHERE id = :id";
        $params = [
            'type_compte' => $compte->getTypeCompte()->value,
            'id' => $compte->getId()
        ];
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute($params);
    }

    public function update() {}
    public function delete() {}
    public function selectById($compteId) {
        $query = "SELECT * FROM comptes WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $compteId]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row ? Compte::toObject($row) : null;
    }
    public function selectBy(array $filter) {}





    public function findAll(array $filter): array
    {
        return [];
    }

    public function findById(): ?Compte
    {

        return null;
    }

    public function findByTelephone(string $telephone) {}
}
