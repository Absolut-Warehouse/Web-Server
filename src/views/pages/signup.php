<!doctype html>
<html lang="fr">
<head>
    <title><?= htmlspecialchars($title ?? 'Orange Box — '. $data["lang"]['signup']['title']) ?></title>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/form.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="auth-section">

    <section class="register-form main-content">
        <h2><?= $data["lang"]['signup']['content']['title'] ?? 'Inscription' ?></h2>
        <form action="/register" method="post">
            <div class="form-group">
                <label for="register-name"><?= $data["lang"]['signup']['content']['name_label'] ?? 'Nom complet' ?></label>
                <input type="text" id="register-name" name="name" placeholder="<?= $data["lang"]['signup']['content']['name_placeholder'] ?? 'Votre nom' ?>" required>
            </div>

            <div class="form-group">
                <label for="register-email"><?= $data["lang"]['signup']['content']['email_label'] ?? 'Adresse e-mail' ?></label>
                <input type="email" id="register-email" name="email" placeholder="<?= $data["lang"]['signup']['content']['email_placeholder'] ?? 'Entrez votre e-mail' ?>" required>
            </div>

            <div class="form-group">
                <label for="register-password"><?= $data["lang"]['signup']['content']['password_label'] ?? 'Mot de passe' ?></label>
                <input type="password" id="register-password" name="password" placeholder="<?= $data["lang"]['signup']['content']['password_placeholder'] ?? 'Créez un mot de passe' ?>" required>
            </div>

            <button type="submit"><?= $data["lang"]['signup']['content']['submit_button'] ?? "S'inscrire" ?></button>
        </form>
        <a href="/signin"><?= $data["lang"]['signup']['content']['signin_link'] ?? 'Déjà un compte ?' ?></a>
    </section>

</main>

<?= view("partial/footer", $data) ?>
</body>
</html>