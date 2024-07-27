<?php

namespace App\Controller;

use App\Model\User;

class AuthController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }

    public function login($email, $password) {
        $user = $this->userModel->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /dashboard');
        } else {
            echo 'Invalid credentials';
        }
    }

    public function register($name, $email, $password) {
        if ($this->userModel->create($name, $email, $password)) {
            echo 'User registered successfully';
        } else {
            echo 'Registration failed';
        }
    }
}

