<?php

namespace App\Service;

use App\Core\App;
use App\Entity\Compte;
use App\Entity\Transaction;
use App\Entity\TypeTransaction;
use App\Repository\CompteRepository;
use App\Repository\TransactionRepository;

class TransactionService {

    private static ?TransactionService $instance = null;
    private TransactionRepository $transactionRepository;
    private CompteRepository $compteRepository;

    private function __construct()
    {
        $this->transactionRepository = App::getDependency('TransactionRepository');
        $this->compteRepository = App::getDependency('CompteRepository');
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

    public function createTransfer(array $data, Compte $compteSource): bool
    {
        $compteDestinataire = $this->compteRepository->findByTelephone($data['telephone']);

        if (!$compteDestinataire || !$compteSource) {
            return false;
        }
        $compteDestinataire->setSolde($compteDestinataire->getSolde() + $data['montant']);

        try {
            $this->compteRepository->getPdo()->beginTransaction();

            $result = $this->compteRepository->update($compteDestinataire);
            if (!$result) {
                $this->compteRepository->getPdo()->rollBack();
                return false;
            }
            $transaction = new Transaction();
            $transaction->setMontant(+$data['montant']);
            $transaction->setTypeTransaction(TypeTransaction::DEPOT);
            $transaction->getCompte()->setId($compteDestinataire->getId());
            $depositTransaction = $this->transactionRepository->insert($transaction);
            if (!$depositTransaction) {
                $this->compteRepository->getPdo()->rollBack();
                return false;
            }
            $compteSource->setSolde($compteSource->getSolde() - $data['montant']);
            $result = $this->compteRepository->update($compteSource);
            if (!$result) {
                $this->compteRepository->getPdo()->rollBack();
                return false;
            }
            $transaction = new Transaction();
            $transaction->setMontant(-$data['montant']);
            $transaction->setTypeTransaction(TypeTransaction::RETRAIT);
            $transaction->getCompte()->setId($compteSource->getId());
            $withdrawTransaction = $this->transactionRepository->insert($transaction);

            if (!$withdrawTransaction) {
                $this->compteRepository->getPdo()->rollBack();
                return false;
            }

            $this->compteRepository->getPdo()->commit();
            return true;
        } catch (\PDOException $e) {
            $this->compteRepository->getPdo()->rollBack();
            return false;
        }

    }
}