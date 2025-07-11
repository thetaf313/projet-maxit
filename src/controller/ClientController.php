<?php

namespace App\Controller;

use App\Core\Abstract\AbstractController;
use App\Core\App;
use App\Core\Session;

class ClientController extends AbstractController {

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

    public function index() {
        $this->renderHtml('client/dashboard');
    }

}