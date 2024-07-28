<?php

require_once '../config/config.php';
require_once '../src/Model/User.php';
require_once '../src/Controller/AuthController.php';

use App\Controller\AuthController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController($pdo);
    $authController->login($_POST['email'], $_POST['password']);
}

ob_start();
require '../src/View/auth.php';
$content = ob_get_clean();
require '../src/View/template.php';