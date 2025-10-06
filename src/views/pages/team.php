<!doctype html>
<html lang="fr">
<head>

    <title><?= htmlspecialchars($title ?? 'Orange Box — Accueil') ?></title>
    <?= view("partial/common_head") ?>
    <link rel="stylesheet" href="<?= base_url('/css/team.css') ?>">

</head>
<body>

<?= view("partial/header") ?>

<main>

    <section class="main-content team-section">
        <h2>Notre équipe</h2>
        <p>Notre équipe est composée de trois personnes pour ce projet fictif. Nous sommes tous étudiants en 3ème année à la faculté de Cergy Pontoise.</p>

        <div class="team-members">
            <div class="team-member">
                <h3>Thomas Hornung</h3>
                <p>Main Mission :</p>
            </div>

            <div class="team-member">
                <h3>Hoahan Yu</h3>
                <p>Main Mission :</p>
            </div>

            <div class="team-member">
                <h3>Gauthier Defrance</h3>
                <p>Main Mission : Site web</p>
            </div>
        </div>
    </section>

</main>

<?= view("partial/footer") ?>
</body>
</html>