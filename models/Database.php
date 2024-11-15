<?php

class Database
{
    protected $table;
    
    public function getConnection(): PDO
    {
        try {
            $pdo = new PDO("mysql:dbname=portfolio_db;host=localhost", "root", "");
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function all($conditions = null): mixed
    {
        $data = [];

        try {
            $pdo = $this->getConnection();
            $query = "SELECT * FROM " . $this->table . (!empty($conditions) ? " " . $conditions : "");
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }

        return $data;
    }
}
