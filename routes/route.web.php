<?php

// Tableau contenant les differentes routes de l'appli

use App\Controller\ClientController;
use App\Controller\SecurityController;
use App\Core\ErrorController;

$routes = [
    '/' => [
        'controller' => SecurityController::class,
        'action' => 'index'
    ],
    '/account/create' => [
        'controller' => SecurityController::class,
        'action' => 'createAccount'
    ],
    '/login' => [
        'controller' => SecurityController::class,
        'action' => 'login'
    ],
    '/register' => [
        'controller' => SecurityController::class,
        'action' => 'register',
        'middlewares' => ['cryptPass']
    ],
    '/logout' => [
        'controller' => SecurityController::class,
        'action' => 'logout'
    ],
    '/error/404' => [
        'controller' => ErrorController::class,
        'action' => 'notFound'
    ],
    '/error/403' => [
        'controller' => ErrorController::class,
        'action' => 'forbidden'
    ], 
    '/client/dashboard' => [
        'controller' => ClientController::class,
        'action' => 'index',
        'middlewares' => ['auth']
    ],
    '/client/change-account' => [
        'controller' => ClientController::class,
        'action' => 'changeAccount',
        'middlewares' => ['auth']
    ],
    '/client/account/add-secondary' => [
        'controller' => ClientController::class,
        'action' => 'createSecondaryAccount',
        'middlewares' => ['auth']
    ],
    '/client/account/store-secondary' => [
        'controller' => ClientController::class,
        'action' => 'storeSecondaryAccount',
        'middlewares' => ['auth', 'cryptPass']
    ],
    '/client/account/list-transactions' => [
        'controller' => ClientController::class,
        'action' => 'listTransactions',
        'middlewares' => ['auth']
    ],

    '/commercial/dashboard' => [
        'controller' => ServiceComController::class,
        'action' => 'index',
        // 'middlewares' => ['auth', 'isCommercial'],
        'middlewares' => ['auth']
    ],
];