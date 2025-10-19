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
            <?= $data["lang"]['search']['title'] ?> n° <?= htmlspecialchars($content['package_code'] ?? 'Error') ?>
        </h2>
        <img src="<?= '/resources/cardbox.png' ?>" alt="CardBox Image">
    </div>

    <?php if (!empty($content)) : ?>
        <ul class="status-list">
            <li><strong><?= $data["lang"]["search"]["content"]["status_labels"]["package_code"] ?> :</strong> <?= htmlspecialchars($content['package_code']) ?></li>
            <li><strong><?= $data["lang"]["search"]["content"]["status_labels"]["refrigerated"] ?> :</strong> <?= htmlspecialchars($content['refrigerated']) ?></li>
            <li><strong><?= $data["lang"]["search"]["content"]["status_labels"]["fragile"] ?> :</strong> <?= htmlspecialchars($content['fragile']) ?></li>
            <li><strong><?= $data["lang"]["search"]["content"]["status_labels"]["weight"] ?> :</strong> <?= htmlspecialchars($content['weight']) ?></li>
            <li><strong><?= $data["lang"]["search"]["content"]["status_labels"]["arrived_at"] ?> :</strong> <?= htmlspecialchars($content['arrived_at']) ?></li>
            <li><strong><?= $data["lang"]["search"]["content"]["status_labels"]["departed_at"] ?> :</strong> <?= htmlspecialchars($content['departed_at']) ?></li>
            <li><strong><?= $data["lang"]["search"]["content"]["status_labels"]["estimated_delivery"] ?> :</strong> <?= htmlspecialchars($content['estimated_delivery']) ?></li>
            <li><strong><?= $data["lang"]["search"]["content"]["status_labels"]["status"] ?> :</strong> <?= htmlspecialchars($content['status']) ?></li>
        </ul>

    <?php else : ?>
        <p><?= $data["lang"]['search']['content']['status_labels']['not_found'] ?></p>
    <?php endif; ?>
</main>

<?= view("partial/footer", $data) ?>
</body>
</html>
