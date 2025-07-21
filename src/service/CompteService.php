<?php

namespace App\Service;

use App\Core\App;
use App\Entity\Compte;
use App\Entity\Transaction;
use App\Entity\TypeCompte;
use App\Entity\TypeTransaction;
use App\Entity\User;
use App\Repository\CompteRepository;
use App\Repository\TransactionRepository;
use PDOException;

class CompteService
{

    private static ?CompteService $instance = null;
    private CompteRepository $compteRepository;
    private TransactionRepository $transactionRepository;

    public function __construct()
    {
        $this->compteRepository = App::getDependency('CompteRepository');
        $this->transactionRepository = App::getDependency('TransactionRepository');
    }

    public static function getInstance(): CompteService
    {
        if (self::$instance == null) {
            self::$instance = new CompteService();
        }
        return self::$instance;
    }

    public function getComptePrincipalByUser(User $user): ?Compte
    {
        return $this->compteRepository->selectPrincipalByUser($user);
    }

    public function getComptesSecondairesByUser(User $user): array
    {
        return $this->compteRepository->selectSecondairesByUser($user);
    }

    public function creerCompteSecondaire(array $data, Compte $comptePrincipal): bool
    {
        $compte = new Compte();
        $compte->setTelephone($data['telephone']);
        $compte->setTypeCompte(TypeCompte::SECONDAIRE);
        $compte->getUser()->setId($data['user']);
        $compte->setSolde($data['solde'] ?? 0);
        if (empty($data['solde'])) {
            return $this->compteRepository->insert($compte);
        }
        // transaction
        try {
            $this->compteRepository->getPdo()->beginTransaction();
            $compteId = $this->compteRepository->insert($compte);
            if ($compteId) {
                $depositTransaction = new Transaction();
                $depositTransaction->setMontant($data['solde']);
                $depositTransaction->setTypeTransaction(TypeTransaction::DEPOT);
                $depositTransaction->getCompte()->setId($compteId);
                //statut transaction
                $transactionId = $this->transactionRepository->insert($depositTransaction);
                if ($transactionId) {
                    $comptePrincipal->setSolde($comptePrincipal->getSolde() - $data['solde']);
                    $result = $this->compteRepository->update($comptePrincipal);
                    if ($result) {
                        $withdrawTransaction = new Transaction();
                        $withdrawTransaction->setMontant(-$data['solde']);
                        $withdrawTransaction->setTypeTransaction(TypeTransaction::RETRAIT);
                        $withdrawTransaction->getCompte()->setId($comptePrincipal->getId());
                        $withdrawTransactionId = $this->transactionRepository->insert($withdrawTransaction);
                        if ($withdrawTransactionId) {
                            $this->compteRepository->getPdo()->commit();
                            return true;
                        }
                    }
                }
            }
            $this->compteRepository->getPdo()->rollBack();
            return false;
        } catch (PDOException $e) {
            $this->compteRepository->getPdo()->rollBack();
            return false;
        }
    }

    public function changerComptePrincipal(User $user, int $compteId): bool
    {
        try {
            $this->compteRepository->getPdo()->beginTransaction();
            // Tous les comptes à type secondaire
            $this->compteRepository->updateTypeCompteByUser($user, TypeCompte::SECONDAIRE->value);

            $compte = $this->compteRepository->selectById($compteId);
            if ($compte && $compte->getUser()->getId() === $user->getId()) {
                $compte->setTypeCompte(TypeCompte::PRINCIPAL);

                $result = $this->compteRepository->updateToPrincipal($compte);
                if ($result) {
                    $this->compteRepository->getPdo()->commit();
                    return true;
                } else {
                    $this->compteRepository->getPdo()->rollBack();
                    return false;
                }
            } else {
                $this->compteRepository->getPdo()->rollBack();
                return false;
            }
        } catch (\Exception $e) {
            $this->compteRepository->getPdo()->rollBack();
            return false;
        }
    }
}
