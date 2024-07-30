<?php ob_start(); ?>

<div class="card">
    <h2>Ajouter une question</h2>
    <form method="POST" action="/add-question.php">
        <label>Question :</label>
        <input type="text" name="question_fr" required>
        <br>
        <label>Вопрос :</label>
        <input type="text" name="question_ru" required>
        <br>
        <label>Réponse :</label>
        <input type="text" name="answer_fr" required>
        <br>
        <label>Ответ :</label>
        <input type="text" name="answer_ru" required>
        <br>
        <label>Difficulté :</label>
        <select name="difficulty">
            <option value="junior">Junior</option>
            <option value="middle">Middle</option>
            <option value="senior">Senior</option>
        </select>
        <br>
        <button type="submit">Ajouter la question</button>
    </form>
</div>
<div class="card">
    <h2>Toutes les questions</h2>
    <ul>
        <?php foreach ($questions as $question): ?>
            <li>
                <strong>FR:</strong> <?php echo $question['question_fr']; ?><br>
                <strong>RU:</strong> <?php echo $question['question_ru']; ?><br>
                <strong>Reponce (FR):</strong> <?php echo $question['answer_fr']; ?><br>
                <strong>Ответ (RU):</strong> <?php echo $question['answer_ru']; ?><br>
                <strong>Difficulty:</strong> <?php echo $question['difficulty']; ?><br>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>
