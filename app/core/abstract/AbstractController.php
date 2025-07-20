<?php

namespace App\Core\Abstract;

use App\Core\App;
use App\Core\Session;

abstract class AbstractController
{

    protected string $layout = 'client';
    protected Session $session;

    abstract public function index();
    abstract public function create();
    abstract public function store();
    abstract public function show();
    abstract public function edit();
    abstract public function destroy();

    protected function __construct()
    {
        $this->session = App::getDependency('Session');
    }

    public function renderHtml(string $view, $data = []): void
    {
        extract($data);
        ob_start();
        require_once __DIR__ . '/../../../templates/' . $view . '.html.php';
        $ContentForLayout = ob_get_clean();
        require_once __DIR__ . '/../../../templates/layouts/' . $this->layout . '.layout.php';
    }

    function redirect_to_route(string $route, int $status_code = 302): void
    {
        // Construction de l'URL complète
        $base_url = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $base_url .= $_SERVER['HTTP_HOST'];

        // Nettoyage de la route (suppression des slashs initiaux multiples)
        $clean_route = '/' . ltrim($route, '/');

        header("Location: $base_url$clean_route", true, $status_code);
        exit;
    }
}
