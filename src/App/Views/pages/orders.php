<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/orders.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main>
    <h2><?= htmlspecialchars($data['lang']['orders']['title'] ?? 'Mes colis') ?></h2>

    <?php if (!empty($packages)) : ?>
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>ID Commande</th>
                    <th>Code Colis</th>
                    <th>Réfrigéré</th>
                    <th>Fragile</th>
                    <th>Poids (kg)</th>
                    <th>Statut</th>
                    <th>Entrée</th>
                    <th>Sortie</th>
                    <th>Livraison estimée</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($packages as $pkg): ?>
                    <tr>
                        <td><?= htmlspecialchars($pkg['order_id']) ?></td>
                        <td><?= htmlspecialchars($pkg['package_code']) ?></td>
                        <td><?= $pkg['refrigerated'] ? 'Oui' : 'Non' ?></td>
                        <td><?= $pkg['fragile'] ? 'Oui' : 'Non' ?></td>
                        <td><?= htmlspecialchars($pkg['weight']) ?></td>
                        <td><span class="status <?= htmlspecialchars($pkg['status']) ?>"><?= htmlspecialchars($pkg['status']) ?></span></td>
                        <td><?= htmlspecialchars($pkg['entry_time'] ?? 'En attente') ?></td>
                        <td><?= htmlspecialchars($pkg['exit_time'] ?? 'En attente') ?></td>
                        <td><?= htmlspecialchars($pkg['estimated_delivery'] ?? 'Non disponible') ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p><?= $data['lang']['orders']['no_packages'] ?? 'Vous n’avez aucun colis.' ?></p>
    <?php endif; ?>
</main>

<?= view("partial/footer", $data) ?>
</body>
</html>
