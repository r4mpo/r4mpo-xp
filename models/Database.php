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

    public function all(): mixed
    {
        $data = [];

        try {
            $pdo = $this->getConnection();
            $stmt = $pdo->prepare("SELECT * FROM " . $this->table);
            $stmt->execute();
            $data = $stmt->fetch();
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }

        return $data;
    }
}
