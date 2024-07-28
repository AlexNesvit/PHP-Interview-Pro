<?php ob_start(); ?>

<div class="card">
    <h2>Connexion</h2>
    <form method="POST" action="/PHP-Interview-Pro/public/login.php">
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Mot de passe :</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Connexion</button>
    </form>
</div>
<div class="card">
    <h2>Inscription</h2>
    <form method="POST" action="/PHP-Interview-Pro/public/register.php">
        <label>Nom :</label>
        <input type="text" name="name" required>
        <br>
        <label>Email :</label>
        <input type="email" name="email" required>
        <br>
        <label>Mot de passe :</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Inscription</button>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$authController->register($_POST['name'], $_POST['email'], $_POST['password'])): ?>
        <p style="color: red;">Email already exists. Please use a different email.</p>
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>
