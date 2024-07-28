<?php

namespace App\Model;

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function findByEmail($email) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function create($name, $email, $password) {
        try {
            $stmt = $this->pdo->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
            return $stmt->execute([
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT)
            ]);
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) { // Код ошибки для дублирующей записи
                return false;
            }
            throw $e;
        }
    }
}