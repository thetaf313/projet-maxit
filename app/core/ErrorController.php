<?php

namespace App\Core;

class ErrorController {

    public function notFound() {
        http_response_code(404);
        // require_once __DIR__ . '/../error/404.html.php';
        echo 'Page non trouvée.';
    }

    public function forbidden() {
        http_response_code(403);
        // require_once __DIR__ . '/../error/403.html.php';
        echo 'Accès refusé.';
    }
}