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
        <h2><?= $data["contact"]["content"]["title"] ?></h2>
        <ul>
            <li><?= $data["contact"]["content"]["mail"] ?></li>
            <li><?= $data["contact"]["content"]["github"] ?></li>
            <li><?= $data["contact"]["content"]["instagram"] ?></li>
            <li><?= $data["contact"]["content"]["twitter"] ?></li>
            <li><?= $data["contact"]["content"]["facebook"] ?></li>
            <li><?= $data["contact"]["content"]["linkedin"] ?>
                <ul>
                    <li><?= $data["contact"]["content"]["linkedin1"] ?></li>
                    <li><?= $data["contact"]["content"]["linkedin2"] ?></li>
                    <li><?= $data["contact"]["content"]["linkedin3"] ?></li>
                </ul></li>
        </ul>
    </section>


</main>

<?= view("partial/footer", $data) ?>
</body>
</html>