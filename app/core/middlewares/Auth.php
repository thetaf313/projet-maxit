<?php
namespace App\Core\Middlewares;

use App\Core\App;
use App\Core\Session;

class Auth
{


    private Session $session;
    public function __invoke() {
        
        $this->session = App::getDependency(Session::class);

        if (!$this->session->isset('user')) {
            // Redirige vers la page de connexion si non authentifié
            header('Location: /');
            exit();
        }
    }
}
