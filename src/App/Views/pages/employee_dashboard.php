<?php
// Extraction des données pour plus de clarté
$user = $data['user'];
$employee = $data['employee'];
$terminals = $data['terminals'] ?? []; // Assurez-vous que c'est un tableau
// Assurez-vous que la variable $lang est bien chargée ici
$lang = $data['lang'];

// Définition des propriétés User utilisées pour la lisibilité
$user_prenom = $user->user_prenom ?? 'Employé';
$user_nom = $user->user_nom ?? '';
$user_email = $user->email ?? 'N/A';
$user_phone = $user->user_phone_number ?? 'N/A';

// Simplification pour l'accès aux traductions
$dashboard_lang = $lang['employee_dashboard'];
$na_text = $dashboard_lang['label_not_available'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <title><?= htmlspecialchars($data['page_title'] ?? $dashboard_lang['title']) ?></title>
    <link rel="stylesheet" href="<?= base_url('/css/employee_dashboard.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="container">
    <h1>👋 <?= $dashboard_lang['welcome'] ?>, <?= htmlspecialchars($user_prenom) ?> !</h1>

    <div class="dashboard-grid">

        <div class="info-section">
            <div class="widget">
                <h2>👤 <?= $dashboard_lang['section_account_role'] ?></h2>

                <p><strong><?= $dashboard_lang['label_full_name'] ?> :</strong> <?= htmlspecialchars($user_prenom . ' ' . $user_nom) ?></p>
                <p><strong><?= $dashboard_lang['label_email'] ?> :</strong> <?= htmlspecialchars($user_email) ?></p>
                <p><strong><?= $dashboard_lang['label_phone'] ?> :</strong> <?= htmlspecialchars($user_phone) ?></p>

                <hr>

                <h3><?= $dashboard_lang['section_employment'] ?></h3>
                <p>
                    <strong><?= $dashboard_lang['label_employee_id'] ?> :</strong>
                    <span class="terminal-location">#<?= htmlspecialchars($employee['employee_id'] ?? $na_text) ?></span>
                </p>
                <p>
                    <strong><?= $dashboard_lang['label_position'] ?> :</strong>
                    <?= htmlspecialchars($employee['position'] ?? $na_text) ?>
                </p>
                <p>
                    <strong><?= $dashboard_lang['label_hire_date'] ?> :</strong>
                    <?= htmlspecialchars($employee['hire_date'] ?? $na_text) ?>
                </p>
            </div>
        </div>

        <div class="operation-section">
            <div class="widget" style="border-left-color: #28a745;">
                <h2>📍 <?= $dashboard_lang['section_terminals'] ?></h2>

                <?php if (!empty($terminals)): ?>
                    <p><?= $dashboard_lang['terminal_assigned_text'] ?></p>
                    <ul class="terminal-list">
                        <?php foreach ($terminals as $terminal): ?>
                            <li>
                                <span class="terminal-location">
                                    <?= $dashboard_lang['terminal_id_label'] ?> #<?= htmlspecialchars($terminal['terminal_id']) ?>
                                </span>
                                (<?= htmlspecialchars($terminal['terminal_name'] ?? $dashboard_lang['terminal_name_unknown']) ?>)
                                <br>
                                <?= $dashboard_lang['terminal_location_label'] ?> : *<?= htmlspecialchars($terminal['terminal_location'] ?? $dashboard_lang['terminal_location_unspecified']) ?>*
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <div class="alert alert-warning">
                        <?= $dashboard_lang['no_terminal_assigned'] ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

</main>

<?= view("partial/footer", $data) ?>
</body>
</html>