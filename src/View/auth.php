<?php ob_start(); ?>

<div class="card">
    <h2>Login</h2>
    <form method="POST" action="/login">
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
    <form method="POST" action="/register">
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
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'template.php'; ?>
