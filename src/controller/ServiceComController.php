<?php

use App\Core\Abstract\AbstractController;
use App\Core\App;
use App\Core\Session;

class ServiceComController extends AbstractController
{

    protected Session $session;

    public function create() {}
    public function store() {}
    public function show() {}
    public function edit() {}
    public function destroy() {}
    public function __construct()
    {
        parent::__construct();
        $this->session = App::getDependency(Session::class);
    }
    public function index()
    {
        $this->renderHtml('commercial/dashboard', [
            'title' => 'Dashboard Service Commercial'
        ]);   
    }

    public function manageAccounts()
    {
        // Logique pour gérer les comptes clients
        // Cela peut inclure la création, la modification ou la suppression de comptes.
    }

    public function viewTransactions()
    {
        // Logique pour afficher les transactions des comptes clients
        // Récupérer les transactions et les passer à la vue.
    }
}