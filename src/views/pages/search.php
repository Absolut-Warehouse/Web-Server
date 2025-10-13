<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/order.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="order-status">
    <div class="order-header">
        <h2>
            <?= $data["lang"]['search']['title'] ?> n° <?= htmlspecialchars($order['id'] ?? 'Error') ?>
        </h2>
        <img src="<?= base_url('resources/cardbox.png') ?>" alt="CardBox Image">
    </div>

    <?php if (!empty($content)) : ?>
        <ul class="status-list">
            <li>
                <strong><?= $data["lang"]['search']['content']['status_labels']['arrived'] ?></strong>
                <?= htmlspecialchars($content['arrived_at'] ?? 'En attente') ?>
            </li>
            <li>
                <strong><?= $data["lang"]['search']['content']['status_labels']['departed'] ?></strong>
                <?= htmlspecialchars($content['departed_at'] ?? 'En attente') ?>
            </li>
            <li>
                <strong><?= $data["lang"]['search']['content']['status_labels']['estimated'] ?></strong>
                <?= htmlspecialchars($content['estimated_delivery'] ?? 'Non disponible') ?>
            </li>
            <li>
                <strong><?= $data["lang"]['search']['content']['status_labels']['current_status'] ?></strong>
                <?= htmlspecialchars($content['status'] ?? 'En attente') ?>
            </li>
        </ul>
    <?php else : ?>
        <p><?= $data["lang"]['search']['content']['status_labels']['not_found'] ?></p>
    <?php endif; ?>
</main>

<?= view("partial/footer", $data) ?>
</body>
</html>
