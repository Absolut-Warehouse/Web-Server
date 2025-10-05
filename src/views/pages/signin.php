<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('resources/cardbox.png') ?>" />
    <title><?= htmlspecialchars($title ?? 'Orange Box — Accueil') ?></title>
    <link rel="stylesheet" href="<?= base_url('/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/css/form.css') ?>">
</head>
<body>

<?= view("partial/header") ?>


<main class="auth-section">

    <section class="register-form main-content">
        <h2>Connexion</h2>
        <form action="/login" method="post">
            <div class="form-group">
                <label for="login-email">Adresse e-mail</label>
                <input type="email" id="login-email" name="email" placeholder="Entrez votre e-mail" required>
            </div>

            <div class="form-group">
                <label for="login-password">Mot de passe</label>
                <input type="password" id="login-password" name="password" placeholder="Votre mot de passe" required>
            </div>

            <button type="submit">Se connecter</button>
        </form>
        <a href="/signup">Pas de compte ?</a>
    </section>



</main>

<?= view("partial/footer") ?>

</body>
</html>