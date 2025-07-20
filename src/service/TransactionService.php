<?php

namespace App\Service;

use App\Core\App;
use App\Entity\Compte;
use App\Repository\TransactionRepository;

class TransactionService {

    private static ?TransactionService $instance = null;
    private TransactionRepository $transactionRepository;

    private function __construct()
    {
        $this->transactionRepository = App::getDependency('TransactionRepository');
    }

    public static function getInstance(): TransactionService {
        if (self::$instance == null) {
            self::$instance = new TransactionService();
        }
        return self::$instance;
    }

    public function getLastTransactionsByCompte(Compte $compte, int $limit = 10): array
    {
        return $this->transactionRepository->selectLastByCompte($compte, $limit);

    }

    public function getTransactionsByCompte() {}
}