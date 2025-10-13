<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/style.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main>
    <section class="main-content">
        <h2><?= $data['lang']["FAQ"]["content"]["block-1"]["title"] ?></h2>
        <p><?= $data['lang']["FAQ"]["content"]["block-1"]["text"] ?></p>
    </section>

    <section class="main-content">
        <h2><?= $data['lang']["FAQ"]["content"]["block-2"]["title"] ?></h2>
        <p><?= $data['lang']["FAQ"]["content"]["block-2"]["text"] ?></p>
    </section>

    <section class="main-content">
        <h2><?= $data['lang']["FAQ"]["content"]["block-3"]["title"] ?></h2>
        <p><?= $data['lang']["FAQ"]["content"]["block-3"]["text"] ?></p>
    </section>

    <section class="main-content">
        <h2><?= $data['lang']["FAQ"]["content"]["block-4"]["title"] ?></h2>
        <p><?= $data['lang']["FAQ"]["content"]["block-4"]["text"] ?></p>
    </section>

    <section class="main-content">
        <h2><?= $data['lang']["FAQ"]["content"]["block-5"]["title"] ?></h2>
        <p><?= $data['lang']["FAQ"]["content"]["block-5"]["text"] ?></p>
    </section>

    <section class="main-content">
        <h2><?= $data['lang']["FAQ"]["content"]["block-6"]["title"] ?></h2>
        <p><?= $data['lang']["FAQ"]["content"]["block-6"]["text"] ?></p>
    </section>

    <section class="main-content">
        <h2><?= $data['lang']["FAQ"]["content"]["block-7"]["title"] ?></h2>
        <p><?= $data['lang']["FAQ"]["content"]["block-7"]["text"] ?></p>
    </section>
</main>


<?= view("partial/footer", $data) ?>
</body>
</html>