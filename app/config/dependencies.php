<?php
use App\Core\Database;
use App\Core\Session;
use App\Repository\CompteRepository;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use App\Service\SecurityService;
use Symfony\Component\Yaml\Yaml;

$dependencies = [
    "core" => [
        "database" => Database::class,
        "session" => Session::class,
    ],
    "service" => [
        "securityService" => SecurityService::class,
    ],
    "repository" => [
        "userRepository" => UserRepository::class,
        "compteRepository" => CompteRepository::class,
        "transactionRepository" => TransactionRepository::class,
    ]
];

function getDependency(string $nomClass) {
    $dependencies = Yaml::parseFile(__DIR__. '/../config/services.yml');
    foreach ($dependencies as $group) {
        if (isset($group[$nomClass])) {
            $className = $group[$nomClass];
            if (class_exists($className)) {
                // Vérifie si la méthode getInstance existe
                if (method_exists($className, 'getInstance')) {
                    return $className::getInstance();
                } else {
                    // Sinon, essaie d'instancier normalement
                    return new $className();
                }
            }
        }
    }
    return null;
}