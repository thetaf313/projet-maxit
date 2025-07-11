<?php
namespace App\Core\Middlewares;

use App\Core\App;
use App\Core\Session;

class Auth
{

    public function __invoke() {
        
        // $session = App::getDependency(Session::class);

        if (!isset($_SESSION['user'])) {
            // Redirige vers la page de connexion si non authentifié
            header('Location: /');
            exit();
        }
    }
}
