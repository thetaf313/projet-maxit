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
        $this->session = App::getDependency('Session');
        $this->compteService = App::getDependency('CompteService');
        $this->transactionService = App::getDependency('TransactionService');
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

    public function changeAccount() {

        $user = $this->session->get('user');
        $user = User::toObject($user);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $compteId = $_POST['compte_id'] ?? null;
            error_log($user->getId());
            if ($compteId) {
                $result = $this->compteService->changerComptePrincipal($user, (int)$compteId);
                if ($result) {
                    $this->session->set('success', 'Compte principal changé avec succès.');
                } else {
                    $this->session->set('error', 'Erreur lors du changement de compte principal.');
                }
            } else {
                $this->session->set('error', 'Aucun compte sélectionné.');
            }
        }
        // $this->redirect('/client/dashboard'); creer redirectToRoute()
        header('Location: /client/dashboard');
        exit();
    }

    public function createSecondaryAccount() {
        $user = $this->session->get('user');
        $user = User::toObject($user);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'telephone' => $_POST['telephone'] ?? '',
                'solde' => $_POST['solde'] ?? 0,
                'user' => $user->getId()
            ];
            $result = $this->compteService->creerCompteSecondaire($data);
            if ($result) {
                $this->session->set('success', 'Compte secondaire créé avec succès.');
            } else {
                $this->session->set('error', 'Erreur lors de la création du compte secondaire.');
            }
            // $this->redirect('/client/dashboard'); creer redirectToRoute()
            header('Location: /client/dashboard');
            exit();
        }
        $this->renderHtml('client/add-secondary');
    }

    public function listTransactions() {
        $user = $this->session->get('user');
        $user = User::toObject($user);
        $comptePrincipal = $this->compteService->getComptePrincipalByUser($user);
        if (!$comptePrincipal) {
            $this->session->set('error', 'Aucun compte principal trouvé.');
            header('Location: /client/dashboard');
            exit();
        }
        $transactions = $this->transactionService->getLastTransactionsByCompte($comptePrincipal, 20);
        $this->renderHtml('client/list-transactions', [
            'transactions' => array_map(fn($transaction) => $transaction->toArray(), $transactions)
        ]);
    }

    public function transfer() {
        $user = $this->session->get('user');
        $user = User::toObject($user);
        $comptesSecondaires = $this->compteService->getComptesSecondairesByUser($user);
        $this->renderHtml('client/transfert-depot', [
            'comptesSecondaires' => array_map(fn($compte) => $compte->toArray(), $comptesSecondaires)
        ]);
    }


}