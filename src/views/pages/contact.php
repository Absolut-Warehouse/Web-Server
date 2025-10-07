<!doctype html>
<html lang="fr">
<head>
    <title><?= htmlspecialchars($title ?? 'Orange Box — Accueil') ?></title>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/contact.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main>

    <section class="main-content">
        <h2><?= $data['lang']["contact"]["content"]["title"] ?></h2>
        <ul>
            <li><?= $data['lang']["contact"]["content"]["mail"] ?></li>
            <li><?= $data['lang']["contact"]["content"]["github"] ?></li>
            <li><?= $data['lang']["contact"]["content"]["instagram"] ?></li>
            <li><?= $data['lang']["contact"]["content"]["twitter"] ?></li>
            <li><?= $data['lang']["contact"]["content"]["facebook"] ?></li>
            <li><?= $data['lang']["contact"]["content"]["linkedin"] ?>
                <ul>
                    <li><?= $data['lang']["contact"]["content"]["linkedin1"] ?></li>
                    <li><?= $data['lang']["contact"]["content"]["linkedin2"] ?></li>
                    <li><?= $data['lang']["contact"]["content"]["linkedin3"] ?></li>
                </ul></li>
        </ul>
    </section>


</main>

<?= view("partial/footer", $data) ?>
</body>
</html>