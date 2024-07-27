<?php

session_start();

require_once '../vendor/autoload.php';
require_once '../config/config.php';

use App\Controller\AuthController;
use App\Controller\QuestionController;

$authController = new AuthController($pdo);
$questionController = new QuestionController($pdo);

// Получение пути запроса
$request = $_SERVER['REQUEST_URI'];

// Маршрутизация
switch ($request) {
    case '/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login($_POST['email'], $_POST['password']);
        } else {
            require '../src/View/auth.php';
        }
        break;

    case '/register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->register($_POST['name'], $_POST['email'], $_POST['password']);
        } else {
            require '../src/View/auth.php';
        }
        break;

    case '/add-question':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $questionController->addQuestion($_POST['question_fr'], $_POST['question_ru'], $_POST['answer_fr'], $_POST['answer_ru'], $_POST['difficulty']);
        } else {
            $questionController->showQuestions();
        }
        break;

    case '/questions':
        $questionController->showQuestions();
        break;

    default:
        require '../src/View/auth.php';
        break;
}


