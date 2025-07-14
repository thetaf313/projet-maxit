<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Core\App;
use App\Core\Session;
use App\Entity\User;
use App\Service\CompteService;
use App\Service\TransactionService;

class ClientController extends AbstractController {

    private CompteService $compteService;
    private TransactionService $transactionService;
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
        $this->compteService = App::getDependency(CompteService::class);
        $this->transactionService = App::getDependency(TransactionService::class);
    }

    public function index() {
        // recuperer le compte principal de l'utilisateur
        $user = $this->session->get('user');
        $user = User::toObject($user);
        $comptePrincipal = $this->compteService->getComptePrincipalByUser($user);
        $comptesSecondaires = $compteSecondaires = $this->compteService->getComptesSecondairesByUser($user);

        $lastTransactions = [];
        $lastTransactions = $this->transactionService->getLastTransactionsByCompte($comptePrincipal, 10);
        $this->renderHtml('client/dashboard', [
            'comptePrincipal' => $comptePrincipal->toArray(),
            'comptesSecondaires' => array_map(fn($compte) => $compte->toArray(), $comptesSecondaires),
            'lastTransactions' => array_map(fn($transaction) => $transaction->toArray(), $lastTransactions)
        ]);
    }

}