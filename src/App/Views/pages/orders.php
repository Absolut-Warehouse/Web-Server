<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/orders.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main>
    <h2><?= $data['lang']['orders']['title'] ?? 'Mes colis' ?></h2>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error'] ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (!empty($packages)) : ?>
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <?php foreach ($data['lang']['orders']['table'] as $label): ?>
                        <th><?= $label ?></th>
                    <?php endforeach; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($packages as $pkg): ?>
                    <tr>
                        <td><?= $pkg['order_id'] ?></td>
                        <td><?= $pkg['package_code'] ?></td>
                        <td><?= $pkg['refrigerated'] ? $data['lang']['orders']['common']['yes'] : $data['lang']['orders']['common']['no'] ?></td>
                        <td><?= $pkg['fragile'] ? $data['lang']['orders']['common']['yes'] : $data['lang']['orders']['common']['no'] ?></td>
                        <td><?= $pkg['weight'] ?></td>
                        <td><?= $data['lang']['orders']['status'][$pkg['status']] ?? $pkg['status'] ?></td>
                        <td><?= $pkg['entry_time'] ?? $data['lang']['orders']['status_texts']['pending'] ?></td>
                        <td><?= $pkg['exit_time'] ?? $data['lang']['orders']['status_texts']['pending'] ?></td>
                        <td><?= $pkg['estimated_delivery'] ?? $data['lang']['orders']['status_texts']['no_data'] ?></td>
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
