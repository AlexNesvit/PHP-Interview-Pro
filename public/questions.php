<?php

require_once '../config/config.php';
require_once '../src/Model/Question.php';
require_once '../src/Controller/QuestionController.php';

use App\Controller\QuestionController;

$questionController = new QuestionController($pdo);
ob_start();
$questionController->showQuestions();
$content = ob_get_clean();
require '../src/View/template.php';