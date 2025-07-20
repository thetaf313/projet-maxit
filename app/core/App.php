<?php

namespace App\Core;

use Symfony\Component\Yaml\Yaml;

class App
{

    private static array $instances = [];
    private static array $dependencies = [];

    public static function getDependency(string $nomClass)
    {

        if (empty(self::$dependencies)) {
            self::$dependencies = Yaml::parseFile(__DIR__ . '/../config/services.yml');
        }
        $dependencies = self::$dependencies;
        foreach ($dependencies as $group) {
            if (isset($group[$nomClass])) {
                $className = $group[$nomClass];
                if (class_exists($className)) {
                    // Vérifie si la méthode getInstance existe
                    if (method_exists($className, 'getInstance')) {
                        $instance = $className::getInstance();
                        self::$instances[$nomClass] = $instance;
                        return $instance;
                    } else {
                        // Sinon, essaie d'instancier normalement
                        return new $className();
                    }
                }
            }
        }
        return null;
    }






























    // public static function getDependency(string $className)
    // {
    //     if (isset(self::$instances[$className])) {
    //         return self::$instances[$className];
    //     }

    //     $reflection = new ReflectionClass($className);

    //     $constructor = $reflection->getConstructor();

    //     $constructor->setAccessible(true);
    //     $instance = $reflection->newInstance();
    //     self::$instances[$className] = $instance;

    //     $constructor->setAccessible(false);

    //     return $instance;
    // }
}
