<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('resources/cardbox.png') ?>" />
    <title><?= htmlspecialchars($title ?? 'Orange Box — Accueil') ?></title>
    <link rel="stylesheet" href="<?= base_url('/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/css/order.css') ?>">
</head>
<body>

<?= view("partial/header") ?>

<main class="order-status">
    <div class="order-header">
        <h2>Commande n° <?= htmlspecialchars($order['id'] ?? 'Error') ?></h2>
        <img src="<?= base_url('resources/cardbox.png') ?>" alt="CardBox Image">
    </div>

    <?php if (!empty($order)) : ?>
        <ul class="status-list">
            <li>
                <strong>Arrivée dans l'entrepôt :</strong>
                <?= htmlspecialchars($order['arrived_at'] ?? 'En attente') ?>
            </li>
            <li>
                <strong>Départ de l'entrepôt :</strong>
                <?= htmlspecialchars($order['departed_at'] ?? 'En attente') ?>
            </li>
            <li>
                <strong>Livraison estimée :</strong>
                <?= htmlspecialchars($order['estimated_delivery'] ?? 'Non disponible') ?>
            </li>
            <li>
                <strong>Statut actuel :</strong>
                <?= htmlspecialchars($order['status'] ?? 'En attente') ?>
            </li>
        </ul>
    <?php else : ?>
        <p>Commande introuvable.</p>
    <?php endif; ?>
</main>

<?= view("partial/footer") ?>
</body>
</html>
