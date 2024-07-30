<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Entretien Pro</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>PHP Entretien Pro</h1>
            <p>Prépare-toi à réussir tes entretiens !</p>
            <?php if (isset($_SESSION['user_id'])): ?>
                <form method="POST" action="/public/logout.php">
                    <button type="submit" class="logout-button">Déconnexion</button>
                </form>
            <?php endif; ?>
        </header>
        <section class="content">
            <?php echo $content; ?>
        </section>
    </div>
</body>
</html>
