<?php

namespace App\Repository;

use App\Core\Abstract\AbstractRepository;
use App\Entity\Role;

class RoleRepository extends AbstractRepository
{
    private static ?RoleRepository $instance = null;

    private function __construct()
    {
        parent::__construct();
    }

    public static function getInstance(): RoleRepository
    {
        if (self::$instance === null) {
            self::$instance = new RoleRepository();
        }
        return self::$instance;
    }

    public function selectByRoleName(string $roleName): ?array
    {
        $query = "SELECT * FROM roles WHERE nom = :role_name";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['role_name' => $roleName]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $row ? $row : null;
    }

    public function selectAll() {}
    public function insert($entity):int {return 0;}
    public function update() {}
    public function delete() {}
    public function selectById() {}
    public function selectBy(array $filter) {}
}