<?php

namespace App\Core\Abstract;

use App\Core\App;
use PDO;
use PDOException;

abstract class AbstractRepository
{
     protected PDO $pdo;
     protected string $table;

    abstract public function selectAll();
    abstract public function insert($entity): ?int;
    abstract public function update($entity);
    abstract public function delete();
//     abstract public function selectById();
    abstract public function selectBy(array $filter);

    protected function __construct()
    {
        $this->pdo = App::getDependency('Database');
    }


     /**
      * Get the value of pdo
      */ 
     public function getPdo()
     {
          return $this->pdo;
     }

      public function exists(string $column, string $value) {
        $query = "SELECT COUNT(*) FROM $this->table WHERE $column = :value";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    } 
}