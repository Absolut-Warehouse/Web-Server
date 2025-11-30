<?php
// On récupère les données de l'employé passées dans le tableau $data
$employee = $data['employee'] ?? [];
// Les postes disponibles (issus de l'ENUM EMPLOYEE_POSTE)
$positions = ['Gestionnaire', 'Répartiteur', 'Livreur'];
// Les genres disponibles (issus de l'ENUM sexe). Assurez-vous que cette colonne est dans votre table "user"
$sexes = ['H', 'F', 'N'];
$lang = $data['lang'];
$edit_lang = $lang['employee_edit']; // Accès rapide à la nouvelle section de traduction

// Vérification basique pour s'assurer que nous avons un employé
if (empty($employee) || !isset($employee['employee_id'])) {

    // --- BLOC DE DÉBOGAGE MIS À JOUR ---
    echo '<div class="alert alert-danger" style="margin: 20px;">';
    // Utilisation des clés de traduction
    echo '<h3>' . $edit_lang['debug_error_title'] . '</h3>';
    echo '<p>' . $edit_lang['debug_error_text'] . '</p>';

    // Afficher le contenu de la variable $employee de manière lisible
    echo '<h4>' . $edit_lang['debug_error_content_title'] . '</h4>';
    echo '<pre style="background-color: #fdd; padding: 10px; border: 1px solid #f00;">';
    print_r($employee); // print_r() est idéal pour les tableaux
    echo '</pre>';
    echo '</div>';
    // ---------------------------------

    echo '</main>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/form_style.css') ?>">
    <title><?= htmlspecialchars($data['page_title'] ?? $edit_lang['page_title']) ?></title>
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="container">
    <div class="form-container">

        <h1 class="employee-info-header">
            <?= $edit_lang['header_prefix'] ?>
            <span class="highlight-info">
                <?= htmlspecialchars($employee['user_prenom'] ?? 'N/A') . ' ' . htmlspecialchars($employee['user_nom'] ?? 'N/A') ?>
                (<?= htmlspecialchars($employee['email'] ?? 'N/A') ?>)
            </span>
        </h1>

        <hr>

        <form action="/employee/update" method="POST">

            <input type="hidden" name="employee_id" value="<?= htmlspecialchars($employee['employee_id']) ?>">
            <input type="hidden" name="user_email" value="<?= htmlspecialchars($employee['email'] ?? '') ?>">

            <p><?= $edit_lang['instruction_text'] ?></p>

            <div class="form-group">
                <label for="position"><?= $edit_lang['label_role'] ?> :</label>
                <select id="position" name="position">
                    <?php foreach ($positions as $pos): ?>
                        <option value="<?= $pos ?>" <?= (($employee['position'] ?? '') === $pos) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($pos) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="hire_date"><?= $edit_lang['label_hire_date'] ?> :</label>
                <input type="date" id="hire_date" name="hire_date"
                       value="<?= htmlspecialchars($employee['hire_date'] ?? '') ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">💾 <?= $edit_lang['button_submit'] ?></button>

                <button type="button"
                        class="btn-delete"
                        onclick="confirmDelete('<?= htmlspecialchars($employee['employee_id']) ?>', '<?= htmlspecialchars($employee['user_prenom'] ?? $edit_lang['delete_confirm_default']) ?>', '<?= htmlspecialchars($edit_lang['delete_confirm_prompt']) ?>')">
                    🗑️ <?= $edit_lang['button_delete'] ?>
                </button>
            </div>
        </form>
    </div>
</main>

<?= view("partial/footer", $data) ?>

<script>
    /**
     * Demande confirmation et envoie une requête POST de suppression.
     * Note: J'ai ajouté un troisième argument 'promptTemplate' pour la traduction.
     */
    function confirmDelete(employeeId, employeeName, promptTemplate) {
        // Remplace les placeholders %s dans le template pour la traduction
        const message = promptTemplate.replace('%s', employeeName).replace('%s', employeeId);

        if (confirm(message)) {
            // Crée dynamiquement un formulaire POST pour envoyer la requête de suppression
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/employee/delete'; // Assurez-vous que cette route POST existe

            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'employee_id';
            idInput.value = employeeId;

            form.appendChild(idInput);
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>

</body>
</html>