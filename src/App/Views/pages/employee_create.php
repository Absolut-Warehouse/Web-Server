<?php
// Les données proviennent de EmployeeController::createForm()
$positions = $data['positions'] ?? ['Gestionnaire', 'Répartiteur', 'Livreur'];
$sexes = $data['sexes'] ?? ['H', 'F', 'N']; // Bien que le sexe ne soit pas créé, il est souvent utile pour l'UI

// Récupération des messages d'erreur de l'URL si besoin
$error_message = $_GET['error'] ?? null;

// Accès rapide aux traductions
$lang = $data['lang'];
$create_lang = $lang['employee_create'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/employee_create.css') ?>">
    <title><?= htmlspecialchars($data['page_title'] ?? $create_lang['page_title']) ?></title>
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="container">
    <div class="form-container">

        <h1><?= $create_lang['main_header'] ?></h1>

        <p class="description">
            <?= $create_lang['description'] ?>
        </p>

        <?php if ($error_message): ?>
            <div class="alert alert-danger">
                <?= $create_lang['error_prefix'] ?> <?= htmlspecialchars(urldecode($error_message)) ?>
            </div>
        <?php endif; ?>

        <hr>

        <form action="/employee/create" method="POST">

            <h2><?= $create_lang['section_user_account'] ?></h2>

            <div class="form-group">
                <label for="email"><?= $create_lang['label_email'] ?></label>
                <input type="email" id="email" name="email"
                       placeholder="<?= $create_lang['placeholder_email'] ?>"
                       required
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                <small class="form-hint"><?= $create_lang['hint_email'] ?></small>
            </div>

            <hr>

            <h2><?= $create_lang['section_employment_info'] ?></h2>

            <div class="form-group">
                <label for="position"><?= $create_lang['label_position'] ?></label>
                <select id="position" name="position" required>
                    <option value="">-- <?= $create_lang['option_select_position'] ?> --</option>
                    <?php
                    $selected_pos = $_POST['position'] ?? '';
                    foreach ($positions as $pos):
                        ?>
                        <option value="<?= $pos ?>" <?= ($selected_pos === $pos) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($pos) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="hire_date"><?= $create_lang['label_hire_date'] ?></label>
                <input type="date" id="hire_date" name="hire_date"
                       value="<?= htmlspecialchars($_POST['hire_date'] ?? date('Y-m-d')) ?>"
                       required>
            </div>

            <div class="form-actions">
                <a href="/manage" class="btn-cancel"><?= $create_lang['button_cancel'] ?></a>
                <button type="submit" class="btn-submit"><?= $create_lang['button_submit'] ?></button>
            </div>
        </form>
    </div>
</main>

<?= view("partial/footer", $data) ?>

</body>
</html>