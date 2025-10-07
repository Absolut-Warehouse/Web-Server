<!doctype html>
<html lang="fr">
<head>
    <title><?= htmlspecialchars($title ?? 'Orange Box — ' . ($data["lang"]['tech']['title'] ?? 'Technique')) ?></title>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/tech.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="main-content tech-page">
    <section class="tech-intro">
        <h2><?= $data["lang"]['tech']['title'] ?? 'Page technique' ?></h2>
        <p><?= $data["lang"]['tech']['intro'] ?? 'Informations techniques sur la connexion et l’environnement serveur.' ?></p>
    </section>

    <section class="tech-grid">
        <div class="card">
            <h3><?= $data["lang"]['tech']['labels']['ip'] ?? 'IP' ?></h3>
            <p><?= htmlspecialchars($system['ip'] ?? 'Unknown') ?></p>
        </div>

        <div class="card">
            <h3><?= $data["lang"]['tech']['labels']['browser'] ?? 'Navigateur' ?></h3>
            <p><?= htmlspecialchars($system['browser'] ?? $system['user_agent'] ?? 'Unknown') ?></p>
            <small><?= htmlspecialchars($system['user_agent'] ?? '') ?></small>
        </div>

        <div class="card">
            <h3><?= $data["lang"]['tech']['labels']['server_time'] ?? 'Heure serveur' ?></h3>
            <p><?= htmlspecialchars($system['server_time'] ?? '') ?></p>
            <small><?= htmlspecialchars($system['timezone'] ?? '') ?></small>
        </div>

        <div class="card">
            <h3><?= $data["lang"]['tech']['labels']['php_version'] ?? 'PHP' ?></h3>
            <p><?= htmlspecialchars($system['php_version'] ?? '') ?></p>
            <small><?= $data["lang"]['tech']['labels']['memory_limit'] ?? 'Mémoire' ?>: <?= htmlspecialchars($system['memory_limit'] ?? '') ?></small>
        </div>

        <div class="card">
            <h3><?= $data["lang"]['tech']['labels']['server_software'] ?? 'Serveur' ?></h3>
            <p><?= htmlspecialchars($system['server_software'] ?? '') ?></p>
        </div>

        <div class="card">
            <h3><?= $data["lang"]['tech']['labels']['protocol'] ?? 'Protocole / Méthode' ?></h3>
            <p><?= htmlspecialchars(($system['is_https'] ? 'HTTPS' : 'HTTP') . ' — ' . ($system['protocol'] ?? '')) ?></p>
            <small><?= htmlspecialchars($system['method'] ?? '') ?></small>
        </div>

        <div class="card wide">
            <h3><?= $data["lang"]['tech']['labels']['headers'] ?? 'En-têtes (sélection)' ?></h3>
            <ul class="small-list">
                <?php foreach ($system['headers'] ?? [] as $k => $v): ?>
                    <li><strong><?= htmlspecialchars($k) ?>:</strong> <?= htmlspecialchars($v) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="card wide">
            <h3><?= $data["lang"]['tech']['labels']['extensions'] ?? 'Extensions PHP chargées' ?></h3>
            <p class="muted"><?= count($system['loaded_extensions'] ?? []) ?> <?= $data["lang"]['tech']['labels']['extensions_count'] ?? 'extensions' ?></p>
            <ul class="small-list">
                <?php foreach (array_slice($system['loaded_extensions'] ?? [], 0, 20) as $ext): ?>
                    <li><?= htmlspecialchars($ext) ?></li>
                <?php endforeach; ?>
                <?php if (($system['loaded_extensions'] ?? []) && count($system['loaded_extensions']) > 20): ?>
                    <li class="muted">... <?= (count($system['loaded_extensions']) - 20) ?> more</li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="card wide">
            <h3><?= $data["lang"]['tech']['labels']['extra'] ?? 'Autres infos' ?></h3>
            <ul class="small-list">
                <li><strong><?= $data["lang"]['tech']['labels']['accept_language'] ?? 'Accept-Language' ?>:</strong> <?= htmlspecialchars($system['accept_language'] ?? '') ?></li>
                <li><strong><?= $data["lang"]['tech']['labels']['referer'] ?? 'Referer' ?>:</strong> <?= htmlspecialchars($system['referer'] ?? $data["lang"]['tech']['labels']['none'] ?? '—') ?></li>
                <li><strong><?= $data["lang"]['tech']['labels']['remote_port'] ?? 'Port distant' ?>:</strong> <?= htmlspecialchars($system['remote_port'] ?? '') ?></li>
                <li><strong><?= $data["lang"]['tech']['labels']['server_name'] ?? 'Nom du serveur' ?>:</strong> <?= htmlspecialchars($system['server_name'] ?? '') ?></li>
            </ul>
        </div>
    </section>

    <section class="tech-note">
        <p class="muted"><?= $data["lang"]['tech']['note'] ?? "Les informations affichées sont récupérées depuis les en-têtes HTTP et l'environnement PHP. Évitez de partager des données sensibles." ?></p>
    </section>
</main>

<?= view("partial/footer", $data) ?>
</body>
</html>
