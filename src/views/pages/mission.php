<!doctype html>
<html lang="fr">
<head>
    <title><?= htmlspecialchars($title ?? 'Orange Box — Accueil') ?></title>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/mission.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="main-content mission-page">

    <section class="mission-intro">
        <h2>Notre mission</h2>
        <p>Notre mission consiste principalement à mettre en place un serveur web, un serveur applicatif, une base de données et un client applicatif.</p>
    </section>

    <section class="mission-project">
        <h3>Notre projet</h3>
        <p>Pour cette mission, nous avons développé un entrepôt fonctionnel capable de gérer les colis entrant et sortant de manière efficace.</p>
    </section>

    <section class="mission-project">
        <ul class="mission-list">
            <li><span class="bullet">🌐</span> Serveur web pour l'affichage de certaines données et la création d'autres données.</li>
            <li><span class="bullet">🖥️</span> Serveur applicatif pour le traitement des commandes</li>
            <li><span class="bullet">💾</span> Base de données pour stocker les informations sur les colis et les utilisateurs</li>
            <li><span class="bullet">📱</span> Client applicatif pour permettre l’interaction avec le système de gestion de l’entrepôt</li>
        </ul>
    </section>

    <section class="mission-project">
        <p>Le but du projet est donc d'apprendre le fonctionnement d'une base de données (postegreSQL) tout en l'utilisant,
        mais aussi par la même occasion de mettre en place notre propre protocole réseau entre le serveur et client applicatif.</p>
    </section>

</main>


<?= view("partial/footer", $data) ?>
</body>
</html>