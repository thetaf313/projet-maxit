<?php

use App\Controller\ClientController;
use App\Controller\SecurityController;
use App\Core\Database;
use App\Core\Router;
use App\Core\Session;
use App\Repository\CompteRepository;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use App\Service\SecurityService;

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
    ],
    "controller" => [
        "securityController" => SecurityController::class,
        "clientController" => ClientController::class
    ]
];