<?php

namespace App\Service;

use App\Core\App;
use App\Entity\Compte;
use App\Entity\TypeCompte;
use App\Entity\User;
use App\Repository\CompteRepository;

class CompteService
{

    private CompteRepository $compteRepository;

    public function __construct()
    {
        $this->compteRepository = App::getDependency(CompteRepository::class);
    }

    public function getComptePrincipalByUser(User $user): ?Compte
    {
        return $this->compteRepository->selectPrincipalByUser($user);
    }

    public function getComptesSecondairesByUser(User $user): array
    {
        return $this->compteRepository->selectSecondairesByUser($user);
    }

    public function creerCompteSecondaire(array $data): ?int
    {
        $compte = new Compte();
        $compte->setTelephone($data['telephone']);
        $compte->setTypeCompte(TypeCompte::SECONDAIRE);
        $compte->setSolde($data['solde'] ?? 0);
        $compte->getUser()->setId($data['user']);

        return $this->compteRepository->insert($compte);
    }

    public function changerComptePrincipal(User $user, int $compteId): bool
    {
        // Tous les comptes à type secondaire
        $this->compteRepository->updateTypeCompteByUser($user, TypeCompte::SECONDAIRE->value);

        $compte = $this->compteRepository->selectById($compteId);
        if ($compte && $compte->getUser()->getId() === $user->getId()) {
            $compte->setTypeCompte(TypeCompte::PRINCIPAL);
            return $this->compteRepository->updateToPrincipal($compte);
        }
        return false;
    }
}
