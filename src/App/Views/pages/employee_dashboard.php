<?php
// Extraction des données pour plus de clarté
$user = $data['user'];
$employee = $data['employee'];
$terminals = $data['terminals'] ?? []; // Assurez-vous que c'est un tableau
$lang = $data['lang']; // Pour les messages localisés si nécessaire

// Définition des propriétés User utilisées pour la lisibilité
$user_prenom = $user->user_prenom ?? 'Employé';
$user_nom = $user->user_nom ?? '';
$user_email = $user->email ?? 'N/A';
$user_phone = $user->user_phone_number ?? 'N/A';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <title><?= htmlspecialchars($data['page_title'] ?? 'Tableau de bord') ?></title>
    <style>
        /* Styles CSS pour la mise en page du tableau de bord */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 2fr; /* Col Info Perso | Col Infos Opérationnelles */
            gap: 30px;
            padding: 20px;
            max-width: 1200px;
            margin: 20px auto;
        }
        .widget {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-left: 5px solid #007bff; /* Accent color */
        }
        .widget h2 {
            margin-top: 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            color: #333;
            font-size: 1.5em;
        }
        .terminal-list {
            list-style: none;
            padding: 0;
        }
        .terminal-list li {
            padding: 10px 0;
            border-bottom: 1px dashed #f0f0f0;
        }
        .terminal-list li:last-child {
            border-bottom: none;
        }
        .terminal-location {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="container">
    <h1>👋 Bienvenue, <?= htmlspecialchars($user_prenom) ?> !</h1>

    <div class="dashboard-grid">

        <div class="info-section">
            <div class="widget">
                <h2>👤 Infos de Compte et Rôle</h2>

                <p><strong>Nom complet :</strong> <?= htmlspecialchars($user_prenom . ' ' . $user_nom) ?></p>
                <p><strong>Email :</strong> <?= htmlspecialchars($user_email) ?></p>
                <p><strong>Téléphone :</strong> <?= htmlspecialchars($user_phone) ?></p>

                <hr>

                <h3>Détails d'Emploi</h3>
                <p>
                    <strong>ID Employé :</strong>
                    <span class="terminal-location">#<?= htmlspecialchars($employee['employee_id'] ?? 'N/A') ?></span>
                </p>
                <p>
                    <strong>Poste :</strong>
                    <?= htmlspecialchars($employee['position'] ?? 'N/A') ?>
                </p>
                <p>
                    <strong>Recrutement :</strong>
                    <?= htmlspecialchars($employee['hire_date'] ?? 'N/A') ?>
                </p>
            </div>
        </div>

        <div class="operation-section">
            <div class="widget" style="border-left-color: #28a745;">
                <h2>📍 Terminaux Assignés</h2>

                <?php if (!empty($terminals)): ?>
                    <p>Vous êtes affecté(e) aux terminaux suivants :</p>
                    <ul class="terminal-list">
                        <?php foreach ($terminals as $terminal): ?>
                            <li>
                                <span class="terminal-location">
                                    Terminal #<?= htmlspecialchars($terminal['terminal_id']) ?>
                                </span>
                                (<?= htmlspecialchars($terminal['terminal_name'] ?? 'Nom inconnu') ?>)
                                <br>
                                Lieu : *<?= htmlspecialchars($terminal['terminal_location'] ?? 'Adresse non spécifiée') ?>*
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <div class="alert alert-warning">
                        Vous n'avez actuellement aucun terminal assigné. Contactez votre gestionnaire.
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

</main>

<?= view("partial/footer", $data) ?>
</body>
</html>