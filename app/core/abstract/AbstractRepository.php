<?php

namespace App\Core\Abstract;

use App\Core\Database;
use PDO;
use PDOException;

abstract class AbstractRepository
{
     protected PDO $pdo;

    abstract public function selectAll();
    abstract public function insert();
    abstract public function update();
    abstract public function delete();
    abstract public function selectById();
    abstract public function selectBy(array $filter);

    protected function __construct()
    {
        $this->pdo = Database::getInstance();
    }

}