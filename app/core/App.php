<?php

namespace App\Core;

use App\Controller\ClientController;
use App\Controller\SecurityController;
use App\Repository\CompteRepository;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use App\Service\SecurityService;

use App\Core\Database;
use Exception;
use ReflectionClass;

class App
{

    private static array $instances = [];

    public static function getDependency(string $className)
    {
        if (isset(self::$instances[$className])) {
            return self::$instances[$className];
        }

        $reflection = new ReflectionClass($className);

        $constructor = $reflection->getConstructor();

        $constructor->setAccessible(true);
        $instance = $reflection->newInstance();
        self::$instances[$className] = $instance;
        
        $constructor->setAccessible(false);

        return $instance;
    }
}
