<?php

namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Entity\Compte;
use App\Entity\Transaction;

class TransactionRepository extends AbstractRepository{

    private static ?TransactionRepository $instance = null;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'transactions';
    }

    public static function getInstance(): TransactionRepository {
        if (self::$instance == null) {
            self::$instance = new TransactionRepository();
        }
        return self::$instance;
    }

    public function selectLastByCompte(Compte $compte, int $limit = 10): array
    {
        $query = "SELECT * FROM transactions WHERE compte_id = :compte_id ORDER BY date DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($query);
        // $stmt->bindParam(':compte_id', $compte->getId(), \PDO::PARAM_INT);
        // $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute([
            'compte_id' => $compte->getId(),
            'limit' => $limit
        ]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return array_map(fn($row) => Transaction::toObject($row), $rows);
    }

    public function selectAllByCompte(Compte $compte, int $offset = 0, int $limit = 10): array
    {
        $query = "SELECT * FROM transactions WHERE compte_id = :compte_id ORDER BY date DESC LIMIT :offset, :limit";
        $stmt = $this->pdo->prepare($query);
        // $stmt->bindParam(':compte_id', $compte->getId(), \PDO::PARAM_INT);
        // $stmt->bindParam(':offset', $offset, \PDO::PARAM_INT);
        // $stmt->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute([
            'compte_id' => $compte->getId(),
            'offset' => $offset,
            'limit' => $limit
        ]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return array_map(fn($row) => Transaction::toObject($row), $rows);
    }

    public function selectAll() {}

    public function insert($transaction): int  {
        $query = "INSERT INTO {$this->table} (montant, type_transaction, compte_id) 
                  VALUES (:montant, :type_transaction, :compte_id)";
        $params = [
            'montant' => $transaction->getMontant(),
            'type_transaction' => $transaction->getTypeTransaction()->value,
            'compte_id' => $transaction->getCompte()->getId()
        ];
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return (int)$this->pdo->lastInsertId();
    }

    public function update($transaction) {}
    public function delete() {}
    public function selectById() {}
    public function selectBy(array $filter) {}


    public function selectByCompte() {}

    
}