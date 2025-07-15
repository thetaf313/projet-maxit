<?php

namespace App\Core;

class Router
{
    public static function resolve()
    {
        global $routes;
        global $middlewares;

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (array_key_exists($uri, $routes)) {
            $route = $routes[$uri];
            $controller = $route['controller'];
            $action = $route['action'];

            // Middleware
            if (!empty($route['middlewares'])) {
                foreach ($route['middlewares'] as $middlewareName) {
                    if (array_key_exists($middlewareName, $middlewares)) {
                        $middlewareClass = $middlewares[$middlewareName];

                        if (class_exists($middlewareClass)) {
                        $middlewareInstance = new $middlewareClass();
                        if (is_callable($middlewareInstance)) {
                            $middlewareInstance(); // appelle __invoke()
                        }
                    } else {
                        // Middleware introuvable : erreur serveur
                        header('Location: /error/500');
                        exit();
                    }
                    }
                    // $middlewareClass = "App\\Core\\Middlewares\\" . ucfirst($middlewareName);
                }
            }

            // Exécution du contrôleur
            if (class_exists($controller) && method_exists($controller, $action)) {
                $controllerInstance = new $controller();
                $controllerInstance->$action();
            } else {
                header('Location: /error/500');
            }
        } else {
            header('Location: /error/404');
        }
    }
}
