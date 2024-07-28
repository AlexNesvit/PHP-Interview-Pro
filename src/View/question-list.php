<?php ob_start(); ?>

<div class="card">
    <h2>Add Question</h2>
    <form method="POST" action="/add-question.php">
        <label>Question (FR):</label>
        <input type="text" name="question_fr" required>
        <br>
        <label>Question (RU):</label>
        <input type="text" name="question_ru" required>
        <br>
        <label>Answer (FR):</label>
        <input type="text" name="answer_fr" required>
        <br>
        <label>Answer (RU):</label>
        <input type="text" name="answer_ru" required>
        <br>
        <label>Difficulty:</label>
        <select name="difficulty">
            <option value="junior">Junior</option>
            <option value="middle">Middle</option>
            <option value="senior">Senior</option>
        </select>
        <br>
        <button type="submit">Add Question</button>
    </form>
</div>
<div class="card">
    <h2>All Questions</h2>
    <ul>
        <?php foreach ($questions as $question): ?>
            <li>
                <strong>FR:</strong> <?php echo $question['question_fr']; ?><br>
                <strong>RU:</strong> <?php echo $question['question_ru']; ?><br>
                <strong>Answer (FR):</strong> <?php echo $question['answer_fr']; ?><br>
                <strong>Answer (RU):</strong> <?php echo $question['answer_ru']; ?><br>
                <strong>Difficulty:</strong> <?php echo $question['difficulty']; ?><br>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>
