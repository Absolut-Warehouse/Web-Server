<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('resources/cardbox.png') ?>" />
    <title><?= htmlspecialchars($title ?? 'Orange Box — Accueil') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/contact.css') ?>">
</head>
<body>

<?= view("partial/header") ?>

<main>

    <section class="main-content">
        <h2>Nos contacts</h2>
        <ul>
            <li>Email : Pas d'email</li>
            <li>Github : https://github.com/Orange-Box-Warehouse</li>
            <li>Instagram : Pas de compte</li>
            <li>Twitter : Pas de compte</li>
            <li>Facebook : Pas de compte</li>
            <li>Linkedin :
                <ul>
                    <li><a href="https://www.linkedin.com/in/gauthier-defrance/">LinkedIn Gauthier</a></li>
                    <li><a href="https://www.linkedin.com/in/thomas-hornung-365ab8381/">LinkedIn Thomas</a></li>
                    <li><a href="#linkedin">LinkedIn Haohan</a></li>
                </ul></li>
        </ul>
    </section>


</main>

<?= view("partial/footer") ?>
</body>
</html>