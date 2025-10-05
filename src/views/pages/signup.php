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
        <h2>Inscription</h2>
        <form action="/register" method="post">
            <div class="form-group">
                <label for="register-name">Nom complet</label>
                <input type="text" id="register-name" name="name" placeholder="Votre nom" required>
            </div>

            <div class="form-group">
                <label for="register-email">Adresse e-mail</label>
                <input type="email" id="register-email" name="email" placeholder="Entrez votre e-mail" required>
            </div>

            <div class="form-group">
                <label for="register-password">Mot de passe</label>
                <input type="password" id="register-password" name="password" placeholder="Créez un mot de passe" required>
            </div>

            <button type="submit">S'inscrire</button>
        </form>
        <a href="/signin">Déjà un compte ?</a>
    </section>
    


</main>

<?= view("partial/footer") ?>
</body>
</html>