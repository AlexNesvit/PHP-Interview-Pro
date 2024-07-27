<?php

session_start();

require_once '../vendor/autoload.php';
require_once '../config/config.php';

use App\Controller\AuthController;
use App\Controller\QuestionController;

$authController = new AuthController($pdo);
$questionController = new QuestionController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (isset($_POST['name'])) {
            $authController->register($_POST['name'], $_POST['email'], $_POST['password']);
        } else {
            $authController->login($_POST['email'], $_POST['password']);
        }
    } elseif (isset($_POST['question_fr']) && isset($_POST['question_ru']) && isset($_POST['answer_fr']) && isset($_POST['answer_ru']) && isset($_POST['difficulty'])) {
        $questionController->addQuestion($_POST['question_fr'], $_POST['question_ru'], $_POST['answer_fr'], $_POST['answer_ru'], $_POST['difficulty']);
    }
} else {
    if (isset($_GET['action']) && $_GET['action'] == 'questions') {
        $questionController->showQuestions();
    } else {
        require '../src/View/auth.php';
    }
}