<?php

namespace App\Service;

use App\Core\App;
use App\Entity\Compte;
use App\Entity\TypeCompte;
use App\Entity\User;
use App\Repository\CompteRepository;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;

class SecurityService
{

    private static ?SecurityService $instance = null;
    private UserRepository $userRepository;
    private CompteRepository $compteRepository;
    private RoleRepository $roleRepository;

    public function __construct()
    {
        $this->userRepository = App::getDependency('UserRepository');
        $this->compteRepository = App::getDependency('CompteRepository');
        $this->roleRepository = App::getDependency('RoleRepository');
    }

    public static function getInstance(): SecurityService
    {
        if (self::$instance == null) {
            self::$instance = new SecurityService();
        }
        return self::$instance;
    }

    public function seConnecter(string $login, string $password): ?object
    {
        $user = $this->userRepository->selectByLogin($login);
        if ($user && password_verify($password, $user->getPassword())) {
            return $user;
        }
        return null;
    }

    public function getRoleByName(string $roleName): ?array
    {
        return $this->roleRepository->selectByRoleName($roleName);
    }

    public function creerCompte(array $data): ?User
    {
        $user = new User();
        $user->setPrenom($data['prenom']);
        $user->setNom($data['nom']);
        $user->setAdresse($data['adresse']);
        $user->setLogin($data['telephone']);
        $user->setPassword($data['password']);
        $user->setNin($data['nin']);
        $user->getRole()->setId($data['role']);
        
        $user->setPhotoRecto($data['photo_recto']);
        $user->setPhotoVerso($data['photo_verso']);

        try {
            // Demarrer une transaction
            $this->userRepository->getPdo()->beginTransaction();

            // Enregistrement de l'utilisateur
            $userId = $this->userRepository->insert($user);
            if (!$userId) {
                $this->userRepository->getPdo()->rollBack();
                return null;
            }
            $user->setId($userId);

            // Création du compte associé
            $compte = new Compte();
            $compte->setTelephone($data['telephone']);
            $compte->setTypeCompte(TypeCompte::PRINCIPAL);
            $compte->setSolde(0);
            $compte->setUser($user);
            $compteId = $this->compteRepository->insert($compte);
            if (!$compteId) {
                $this->userRepository->getPdo()->rollBack();
                return null;
            }
            $compte->setId($compteId);

            $this->userRepository->getPdo()->commit();
            return $user;
        } catch (\Exception $e) {
            $this->userRepository->getPdo()->rollBack();

            error_log('Transaction failed: ' . $e->getMessage());
            return null;
        }
    }
}
