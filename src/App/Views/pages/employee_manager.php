<?php
// Fonction utilitaire pour formater les rôles et statuts
$renderRole = function(?string $roleKey): string {
    $statusClass = 'badge-secondary';
    $roleDisplay = 'Inconnu';

    // Le rôle vient de employee.position (EMPLOYEE_POSTE)
    switch ($roleKey) {
        case 'Gestionnaire':
            $roleDisplay = 'Gestionnaire';
            $statusClass = 'badge-warning';
            break;
        case 'Répartiteur':
            $roleDisplay = 'Répartiteur'; // Afficher le poste exact
            $statusClass = 'badge-info';
            break;
        case 'Livreur':
            $roleDisplay = 'Livreur'; // Afficher le poste exact
            $statusClass = 'badge-info';
            break;
        default:
            $roleDisplay = 'Inconnu';
            $statusClass = 'badge-secondary';
            break;
    }

    return "<span class=\"badge {$statusClass}\">{$roleDisplay}</span>";
};



$renderStatus = function(?string $lastActionTimestamp): string {
    // Si lastActionTimestamp est NULL, l'utilisateur est considéré comme Inactif (jamais connecté)
    if (empty($lastActionTimestamp)) {
        return '<span class="badge badge-danger">Inactif</span>';
    }

    // Calculer la différence entre le temps actuel et la dernière action
    $currentTime = time();
    $lastActionTime = strtotime($lastActionTimestamp);
    $timeDifference = $currentTime - $lastActionTime; // Différence en secondes

    $threshold = 900; // 15 minutes * 60 secondes

    if ($timeDifference < $threshold) {
        // Moins de 15 minutes : ACTIF (en ligne)
        return '<span class="badge badge-success">En ligne 🟢</span>';
    }

    // Plus de 15 minutes : INACTIF (même si une action a été enregistrée)
    // Nous utilisons le badge secondaire (gris) pour éviter le rouge si la personne existe.
    return '<span class="badge badge-secondary">Inactif</span>';
};
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/employee_manager.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="container">
    <h1><?= $data['page_title'] ?></h1>

    <div class="toolbar">
        <a href="/employee/create" class="btn-create">➕ Ajouter un employé</a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th>Nom Complet</th>
                <th>Rôle</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($data['employees'])): ?>
                <tr>
                    <td colspan="6" style="text-align:center; padding: 20px;">
                        Aucun employé trouvé.
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
                               title="Modifier l'employé">
                                Modifier ✏️
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