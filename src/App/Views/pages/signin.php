<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/form.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="auth-section">

    <section class="register-form main-content">
        <h2><?= $data["lang"]['signin']['content']['title'] ?? 'Connexion' ?></h2>

        <!-- Affichage des messages flash -->
        <?php if ($msg = flash('error')): ?>
            <div class="alert alert-error"><?= htmlspecialchars($msg) ?></div>
        <?php endif; ?>

        <form action="/login" method="post">
            <div class="form-group">
                <label for="login-email"><?= $data["lang"]['signin']['content']['email_label'] ?? 'Adresse e-mail' ?></label>
                <input type="email" id="login-email" name="email" placeholder="<?= $data["lang"]['signin']['content']['email_placeholder'] ?? 'Entrez votre e-mail' ?>" required>
            </div>

            <div class="form-group">
                <label for="login-password"><?= $data["lang"]['signin']['content']['password_label'] ?? 'Mot de passe' ?></label>
                <input type="password" id="login-password" name="password" placeholder="<?= $data["lang"]['signin']['content']['password_placeholder'] ?? 'Votre mot de passe' ?>" required>
            </div>

            <button type="submit"><?= $data["lang"]['signin']['content']['submit_button'] ?? 'Se connecter' ?></button>
        </form>
        <a href="/signup"><?= $data["lang"]['signin']['content']['signup_link'] ?? 'Pas de compte ?' ?></a>
    </section>

</main>

<?= view("partial/footer", $data) ?>

</body>
</html>