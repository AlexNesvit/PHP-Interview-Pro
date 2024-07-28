<?php

namespace App\Controller;

use App\Model\Question;

class QuestionController {
    private $questionModel;

    public function __construct($pdo) {
        $this->questionModel = new Question($pdo);
    }

    public function showQuestions($difficulty = null) {
        $questions = $this->questionModel->getAllQuestions($difficulty);
        require '../src/View/question-list.php';
    }

    public function addQuestion($questionFr, $questionRu, $answerFr, $answerRu, $difficulty) {
        if ($this->questionModel->addQuestion($questionFr, $questionRu, $answerFr, $answerRu, $difficulty)) {
            echo 'Question added successfully';
        } else {
            echo 'Failed to add question';
        }
    }
}