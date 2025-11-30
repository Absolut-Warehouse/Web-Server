<?php
// On assume que $data['lang'] est disponible et contient la nouvelle section 'employee_list'
$lang = $data['lang'];
$list_lang = $lang['employee_list'];

// Fonction utilitaire pour formater les rôles et statuts
// Elle utilise maintenant le tableau de traduction $list_lang['role']
$renderRole = function(?string $roleKey) use ($list_lang): string {
    $statusClass = 'badge-secondary';
    $roleDisplay = $list_lang['role']['unknown'] ?? 'Inconnu';

    // Le rôle vient de employee.position (EMPLOYEE_POSTE)
    switch ($roleKey) {
        case 'Gestionnaire':
            $roleDisplay = $list_lang['role']['manager'] ?? 'Gestionnaire';
            $statusClass = 'badge-warning';
            break;
        case 'Répartiteur':
            $roleDisplay = $list_lang['role']['dispatcher'] ?? 'Répartiteur';
            $statusClass = 'badge-info';
            break;
        case 'Livreur':
            $roleDisplay = $list_lang['role']['delivery_driver'] ?? 'Livreur';
            $statusClass = 'badge-info';
            break;
        default:
            $roleDisplay = $list_lang['role']['unknown'] ?? 'Inconnu';
            $statusClass = 'badge-secondary';
            break;
    }

    return "<span class=\"badge {$statusClass}\">{$roleDisplay}</span>";
};


// Elle utilise maintenant le tableau de traduction $list_lang['status']
$renderStatus = function(?string $lastActionTimestamp) use ($list_lang): string {
    $inactive_text = $list_lang['status']['inactive'] ?? 'Inactif';
    $online_text = $list_lang['status']['online'] ?? 'En ligne 🟢';

    // Si lastActionTimestamp est NULL, l'utilisateur est considéré comme Inactif (jamais connecté)
    if (empty($lastActionTimestamp)) {
        return "<span class=\"badge badge-danger\">{$inactive_text}</span>";
    }

    // Calculer la différence entre le temps actuel et la dernière action
    $currentTime = time();
    $lastActionTime = strtotime($lastActionTimestamp);
    $timeDifference = $currentTime - $lastActionTime; // Différence en secondes

    $threshold = 900; // 15 minutes * 60 secondes

    if ($timeDifference < $threshold) {
        // Moins de 15 minutes : ACTIF (en ligne)
        return "<span class=\"badge badge-success\">{$online_text}</span>";
    }

    // Plus de 15 minutes : INACTIF
    return "<span class=\"badge badge-secondary\">{$inactive_text}</span>";
};
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/employee_manager.css') ?>">
    <title><?= htmlspecialchars($data['page_title'] ?? $list_lang['page_title']) ?></title>
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="container">
    <h1><?= htmlspecialchars($data['page_title'] ?? $list_lang['page_title']) ?></h1>

    <div class="toolbar">
        <a href="/employee/create" class="btn-create">➕ <?= $list_lang['button_add'] ?></a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th><?= $list_lang['table_header']['full_name'] ?></th>
                <th><?= $list_lang['table_header']['role'] ?></th>
                <th><?= $list_lang['table_header']['email'] ?></th>
                <th><?= $list_lang['table_header']['phone'] ?></th>
                <th><?= $list_lang['table_header']['status'] ?></th>
                <th><?= $list_lang['table_header']['actions'] ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($data['employees'])): ?>
                <tr>
                    <td colspan="6" style="text-align:center; padding: 20px;">
                        <?= $list_lang['no_employees_found'] ?>
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($data['employees'] as $employee): ?>
                    <tr>
                        <td>
                            <strong><?= htmlspecialchars($employee['user_nom']) ?></strong>
                            <?= htmlspecialchars($employee['user_prenom']) ?>
                        </td>
                        <td>
                            <?= $renderRole($employee['position'] ?? null) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($employee['email']) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($employee['user_phone_number'] ?? 'N/A') ?>
                        </td>
                        <td>
                            <?= $renderStatus($employee['last_action'] ?? null) ?>
                        </td>
                        <td>
                            <a href="/employee/edit?id=<?= $employee['employee_id'] ?>"
                               class="btn-action btn-edit"
                               title="<?= $list_lang['action_edit_title'] ?>">
                                <?= $list_lang['action_edit'] ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</main>

<?= view("partial/footer", $data) ?>
</body>
</html>