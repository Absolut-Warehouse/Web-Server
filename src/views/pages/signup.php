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

<?= view("partial/footer", $data) ?>
</body>
</html>