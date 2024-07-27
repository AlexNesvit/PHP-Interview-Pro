<?php

namespace App\Model;

class Question {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllQuestions($difficulty = null) {
        if ($difficulty) {
            $stmt = $this->pdo->prepare('SELECT * FROM questions WHERE difficulty = :difficulty');
            $stmt->execute(['difficulty' => $difficulty]);
        } else {
            $stmt = $this->pdo->query('SELECT * FROM questions');
        }
        return $stmt->fetchAll();
    }

    public function addQuestion($questionFr, $questionRu, $answerFr, $answerRu, $difficulty) {
        $stmt = $this->pdo->prepare('INSERT INTO questions (question_fr, question_ru, answer_fr, answer_ru, difficulty) VALUES (:question_fr, :question_ru, :answer_fr, :answer_ru, :difficulty)');
        return $stmt->execute([
            'question_fr' => $questionFr,
            'question_ru' => $questionRu,
            'answer_fr' => $answerFr,
            'answer_ru' => $answerRu,
            'difficulty' => $difficulty
        ]);
    }
}

