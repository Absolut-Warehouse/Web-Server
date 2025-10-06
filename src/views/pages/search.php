<!doctype html>
<html lang="fr">
<head>
    <title><?= htmlspecialchars($title ?? 'Orange Box — Accueil') ?></title>
    <?= view("partial/common_head") ?>
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
