<?php

namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Entity\Compte;

class CompteRepository extends AbstractRepository {

    // private static ?CompteRepository $instance = null;

    private function __construct()
    {
        parent::__construct();
    }

    // public static function getInstance() {
    //     if (self::$instance == null) {
    //         self::$instance = new CompteRepository();
    //     }
    // }

    public function selectAll() {}
    public function insert() {}
    public function update() {}
    public function delete() {}
    public function selectById() {}
    public function selectBy(array $filter) {}





    public function findAll(array $filter) : array {
        return [];
    }

    public function findById(): ?Compte {

        return null;
    }

    public function findByTelephone(string $telephone) {}

}