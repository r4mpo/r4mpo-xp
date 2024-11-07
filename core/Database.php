<?php

class Database
{
    public function getConnection(): PDO 
    {
        try {
            $pdo = new PDO("mysql:dbname=portfolio;host=localhost", "root", "");
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}