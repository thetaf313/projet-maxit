<?php

namespace App\Service;

use App\Core\App;
use App\Entity\Compte;
use App\Repository\TransactionRepository;

class TransactionService {

    private TransactionRepository $transactionRepository;

    public function __construct()
    {
        $this->transactionRepository = App::getDependency(TransactionRepository::class);   
    }

    public function getLastTransactionsByCompte(Compte $compte, int $limit = 10): array
    {
        return $this->transactionRepository->selectLastByCompte($compte, $limit);

    }

    public function getTransactionsByCompte() {}
}