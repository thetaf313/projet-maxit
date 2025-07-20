<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Core\App;
use App\Core\FileUploader;
use App\Core\Validator;
use App\Service\SecurityService;

class SecurityController extends AbstractController
{

    private SecurityService $securityService;

    public function __construct()
    {
        parent::__construct();
        $this->securityService = App::getDependency('SecurityService');
        $this->layout = 'security';
    }

    public function create() {}

    public function store() {}

    public function show() {}
    public function edit() {}
    public function destroy() {}

    public function index()
    {
        // Logique pour afficher le formulaire de connexion
        $this->renderHtml('auth/login');
    }

    public function createAccount()
    {
        $role = $this->securityService->getRoleByName('client');
        $this->renderHtml('auth/register', ['role' => $role]);
    }

    public function login()
    {
        $formData = [
            'login' => trim($_POST['login'] ?? ''),
            'password' => trim($_POST['password'] ?? '')
        ];

        // Validation
        Validator::validate($formData, [
            'login' => ['required', 'senegal_phone'],
            'password' => ['required', 'min:3']
        ]);

        if (!Validator::isValid()) {
            $this->session->set('flash_errors', Validator::getErrors());
            // $this->session->set('flash_formData', $formData);
            header('Location: /');
            exit;
        }

        // Authentification
        $user = $this->securityService->seConnecter($formData['login'], $formData['password']);

        if (!$user) {
            Validator::addError('global', 'Login ou mot de passe incorrects');
            $this->session->set('flash_errors', Validator::getErrors());
            $this->session->set('flash_formData', $formData);
            header('Location: /');
            exit;
        }

        // Connexion réussie
        $this->session->set('user', $user->toArray());
        header('Location: /client/dashboard');
        exit;
    }
    public function register()
    {
        error_log('Données du formulaire : ' . print_r($_POST, true));
        Validator::validate($_POST, [
            'prenom' => ['required', 'min:2'],
            'nom' => ['required', 'min:2'],
            'adresse' => ['required', 'min:5'],
            'nin' => ['required', 'senegal_nin', 'unique:UserRepository'],
            'telephone' => ['required', 'senegal_phone', 'unique:UserRepository'],
            'password' => ['required', 'min:8'],
            'photo_recto' => ['file_mime:image/jpeg,image/png', 'file_size:2048000'],
            'photo_verso' => ['file_mime:image/jpeg,image/png', 'file_size:2048000']
        ]);

        if (!Validator::isValid()) {
            $this->session->set('flash_errors', Validator::getErrors());
            $this->session->set('flash_formData', $_POST);
            header('Location: /account/create');
            exit;
        }

        // Upload des photos
        $photoRectoPath = FileUploader::upload($_FILES['photo_recto'], 'uploads');
        $photoVersoPath = FileUploader::upload($_FILES['photo_verso'], 'uploads');

        if (!$photoRectoPath || !$photoVersoPath) {
            $this->session->set('flash_errors', ['global' => 'Erreur lors de l\'upload des photos.']);
            $this->session->set('flash_formData', $_POST);
            header('Location: /account/create');
            exit;
        }
        $_POST['photo_recto'] = $photoRectoPath;
        $_POST['photo_verso'] = $photoVersoPath;

        // Enregistrement
        $user = $this->securityService->creerCompte($_POST);
        if (!$user) {
            $this->session->set('flash_errors', ['global' => 'Erreur lors de la création du compte.']);
            $this->session->set('flash_formData', $_POST);
            header('Location: /account/create');
            exit;
        }
        // Connexion réussie
        $this->session->set('user', $user->toArray());
        $this->session->set('flash_success', 'Compte créé avec succès !');
        header('Location: /client/dashboard');
        exit;
    }

    public function logout()
    {
        // detruire session
        $this->session->destroy();
        header('Location: /');
    }
}
