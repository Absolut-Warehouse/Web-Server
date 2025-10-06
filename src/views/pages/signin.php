<!doctype html>
<html lang="fr">
<head>
    <title><?= htmlspecialchars($title ?? 'Orange Box — Accueil') ?></title>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/form.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>


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

            <button type="submit">Se connecter    </button>
        </form>
        <a href="/signup">Pas de compte ?</a>
    </section>



</main>

<?= view("partial/footer", $data) ?>

</body>
</html>