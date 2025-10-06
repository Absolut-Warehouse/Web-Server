<?php

use Core\Lang;
$lang = Lang::get();
?>
<!doctype html>
<html lang="fr">
<head>
    <title><?= htmlspecialchars($title ?? 'Orange Box — Accueil') ?></title>
    <?= view("partial/common_head", $lang) ?>
    <link rel="stylesheet" href="<?= base_url('css/error.css') ?>">
</head>
<body>

<?= view("partial/header", $lang) ?>

<main class="error-page friendly-404">
    <h1 class="error-code"><?= htmlspecialchars($error_code) ?></h1>
    <p class="error-text"><?= htmlspecialchars($message) ?></p>
    <a href="/" class="back-home">Retour à l’accueil</a>
</main>

<?= view("partial/footer", $lang) ?>
</body>
</html>