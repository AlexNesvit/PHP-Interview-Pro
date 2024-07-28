<?php

require_once '../config/config.php';
require_once '../src/Model/Question.php';
require_once '../src/Controller/QuestionController.php';

use App\Controller\QuestionController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $questionController = new QuestionController($pdo);
    $questionController->addQuestion($_POST['question_fr'], $_POST['question_ru'], $_POST['answer_fr'], $_POST['answer_ru'], $_POST['difficulty']);
}

ob_start();
$questionController->showQuestions();
$content = ob_get_clean();
require '../src/View/template.php';