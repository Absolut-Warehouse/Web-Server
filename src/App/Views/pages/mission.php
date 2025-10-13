<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/mission.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="main-content mission-page">

    <section class="mission-intro">
        <h2><?= $lang['mission']['content']['intro']['title'] ?? 'Notre mission' ?></h2>
        <p><?= $lang['mission']['content']['intro']['text'] ?? 'Notre mission consiste principalement à mettre en place un serveur web, un serveur applicatif, une base de données et un client applicatif.' ?></p>
    </section>

    <section class="mission-project">
        <h3><?= $lang['mission']['content']['project']['title'] ?? 'Notre projet' ?></h3>
        <p><?= $lang['mission']['content']['project']['text'] ?? 'Pour cette mission, nous avons développé un entrepôt fonctionnel capable de gérer les colis entrant et sortant de manière efficace.' ?></p>
    </section>

    <section class="mission-project">
        <ul class="mission-list">
            <?php foreach($lang['mission']['content']['project_list']['items'] ?? [] as $item): ?>
                <li><span class="bullet"><?= $item['icon'] ?? '•' ?></span> <?= $item['text'] ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="mission-project">
        <p><?= $lang['mission']['content']['goal']['text'] ?? 'Le but du projet est donc d\'apprendre le fonctionnement d\'une base de données (PostgreSQL) tout en l\'utilisant, mais aussi par la même occasion de mettre en place notre propre protocole réseau entre le serveur et client applicatif.' ?></p>
    </section>

</main>

<?= view("partial/footer", $data) ?>
</body>
</html>
