<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/team.css') ?>">

</head>
<body>

<?= view("partial/header", $data) ?>

<main>

    <section class="main-content team-section">
        <h2><?= $data["lang"]['team']['content']['title'] ?? 'Notre équipe' ?></h2>
        <p><?= $data["lang"]['team']['content']['description'] ?? 'Notre équipe est composée de trois personnes pour ce projet fictif. Nous sommes tous étudiants en 3ème année à la faculté de Cergy Pontoise.' ?></p>

        <div class="team-members">
            <?php foreach($data["lang"]['team']['content']['members'] ?? [] as $member): ?>
                <div class="team-member">
                    <h3><?= $member['name'] ?></h3>
                    <p><?= $member['mission'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</main>

<?= view("partial/footer", $data) ?>
</body>
</html>