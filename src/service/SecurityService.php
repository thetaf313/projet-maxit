<?php
namespace App\Service;

use App\Core\App;
use App\Repository\UserRepository;

class SecurityService {

    // private static ?SecurityService $instance = null;
    private UserRepository $userRepository;

    public function __construct() 
    {
        $this->userRepository = App::getDependency(UserRepository::class);
    }

    // public static function getInstance(): SecurityService
    // {
    //     if (self::$instance == null) {
    //         self::$instance = new SecurityService();
    //     }
    //     return self::$instance;
    // }

    public function seConnecter(string $login, string $password): ?object
    {
        $user = $this->userRepository->selectByLogin($login);
        if ($user && password_verify($password, $user->getPassword())) {
            return $user;
        }
        return null;
    }
}