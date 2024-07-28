<?php

session_start();

require_once '../config/config.php';
require_once '../src/Model/User.php';
require_once '../src/Model/Question.php';
require_once '../src/Controller/AuthController.php';
require_once '../src/Controller/QuestionController.php';

use App\Controller\AuthController;
use App\Controller\QuestionController;

// Получение пути запроса
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Инициализация контроллеров
$authController = new AuthController($pdo);
$questionController = new QuestionController($pdo);

// Маршрутизация
switch ($request) {
    case '/login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login($_POST['email'], $_POST['password']);
        } else {
            ob_start();
            require '../src/View/auth.php';
            $content = ob_get_clean();
            require '../src/View/template.php';
        }
        break;

    case '/register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->register($_POST['name'], $_POST['email'], $_POST['password']);
        } else {
            ob_start();
            require '../src/View/auth.php';
            $content = ob_get_clean();
            require '../src/View/template.php';
        }
        break;

    case '/add-question':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $questionController->addQuestion($_POST['question_fr'], $_POST['question_ru'], $_POST['answer_fr'], $_POST['answer_ru'], $_POST['difficulty']);
        } else {
            ob_start();
            $questionController->showQuestions();
            $content = ob_get_clean();
            require '../src/View/template.php';
        }
        break;

    case '/questions':
        ob_start();
        $questionController->showQuestions();
        $content = ob_get_clean();
        require '../src/View/template.php';
        break;

    default:
        ob_start();
        require '../src/View/auth.php';
        $content = ob_get_clean();
        require '../src/View/template.php';
        break;
}


