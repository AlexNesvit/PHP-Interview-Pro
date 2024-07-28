<?php ob_start(); ?>

<div class="card">
    <h2>Login</h2>
    <form method="POST" action="/PHP-Interview-Pro/public/login.php">
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</div>
<div class="card">
    <h2>Register</h2>
    <form method="POST" action="/PHP-Interview-Pro/public/register.php">
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Register</button>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$authController->register($_POST['name'], $_POST['email'], $_POST['password'])): ?>
        <p style="color: red;">Email already exists. Please use a different email.</p>
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>
