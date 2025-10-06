<!doctype html>
<html lang="fr">
<head>
    <title><?= htmlspecialchars($title ?? 'Orange Box —'. $data["page_name"]["title"]) ?></title>
    <?= view("partial/common_head", $data) ?>
</head>
<body>

<?= view("partial/header", $data) ?>

<main>



</main>

<?= view("partial/footer", $data) ?>
</body>
</html>