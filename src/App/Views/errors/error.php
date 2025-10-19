<!doctype html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/') . 'css/error.css' ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="error-page friendly-404">
    <h1 class="error-code"><?= htmlspecialchars($data["content"]["error_code"] ?? $lang['error']['content']['code']) ?></h1>
    <p class="error-text"><?= htmlspecialchars($data["content"]["message"] ?? $lang['error']['content']['message']) ?></p>
    <a href="/" class="back-home"><?= $lang['error']['content']['back_home'] ?></a>
</main>

<?= view("partial/footer", $data) ?>
</body>
</html>
