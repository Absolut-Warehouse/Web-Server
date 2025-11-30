<?php
// On récupère les données de l'employé passées dans le tableau $data
$employee = $data['employee'] ?? [];
// Les postes disponibles (issus de l'ENUM EMPLOYEE_POSTE)
$positions = ['Gestionnaire', 'Répartiteur', 'Livreur'];
// Les genres disponibles (issus de l'ENUM sexe). Assurez-vous que cette colonne est dans votre table "user"
$sexes = ['H', 'F', 'N'];

// Vérification basique pour s'assurer que nous avons un employé
if (empty($employee) || !isset($employee['employee_id'])) {

    // --- BLOC DE DÉBOGAGE AJOUTÉ ---
    echo '<div class="alert alert-danger" style="margin: 20px;">';
    echo '<h3>🛑 Erreur de Chargement des Informations d\'Employé</h3>';
    echo '<p>Les informations de l\'employé n\'ont pas pu être chargées.</p>';

    // Afficher le contenu de la variable $employee de manière lisible
    echo '<h4>Contenu de $employee:</h4>';
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
    <title><?= $data['page_title'] ?></title>
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="container">
    <div class="form-container">

        <h1 class="employee-info-header">
            Modification de :
            <span class="highlight-info">
                <?= htmlspecialchars($employee['user_prenom'] ?? 'N/A') . ' ' . htmlspecialchars($employee['user_nom'] ?? 'N/A') ?>
                (<?= htmlspecialchars($employee['email'] ?? 'N/A') ?>)
            </span>
        </h1>

        <hr>

        <form action="/employee/update" method="POST">

            <input type="hidden" name="employee_id" value="<?= htmlspecialchars($employee['employee_id']) ?>">
            <input type="hidden" name="user_email" value="<?= htmlspecialchars($employee['email'] ?? '') ?>">

            <p>Veuillez modifier les informations d'emploi ci-dessous :</p>

            <div class="form-group">
                <label for="position">Rôle/Poste :</label>
                <select id="position" name="position">
                    <?php foreach ($positions as $pos): ?>
                        <option value="<?= $pos ?>" <?= (($employee['position'] ?? '') === $pos) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($pos) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="hire_date">Date de recrutement :</label>
                <input type="date" id="hire_date" name="hire_date"
                       value="<?= htmlspecialchars($employee['hire_date'] ?? '') ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">💾 Enregistrer les modifications</button>

                <button type="button"
                        class="btn-delete"
                        onclick="confirmDelete('<?= htmlspecialchars($employee['employee_id']) ?>', '<?= htmlspecialchars($employee['user_prenom'] ?? 'Cet employé') ?>')">
                    🗑️ Supprimer le compte
                </button>
            </div>
        </form>
    </div>
</main>

<?= view("partial/footer", $data) ?>

<script>
    /**
     * Demande confirmation et envoie une requête POST de suppression.
     */
    function confirmDelete(employeeId, employeeName) {
        if (confirm(`Êtes-vous sûr de vouloir SUPPRIMER le compte de l'employé ${employeeName} (#${employeeId}) ? Cette action est irréversible.`)) {
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

<style>
    /* Style de la boîte principale du formulaire */
    .form-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    /* Style pour l'information statique */
    .employee-info-header {
        font-size: 1.6em;
        color: #333;
        margin-bottom: 20px;
    }
    .highlight-info {
        font-weight: bold;
        color: #007bff; /* Couleur pour mettre en évidence le nom/mail */
    }

    /* Style des groupes de champs */
    .form-group { margin-bottom: 20px; }
    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }
    .form-group input[type="date"],
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 1em;
    }

    /* Style des actions et boutons */
    .form-actions {
        margin-top: 30px;
        display: flex;
        justify-content: space-between; /* Pour espacer les boutons */
    }

    .btn-submit,
    .btn-delete {
        border: none;
        padding: 12px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s;
        font-weight: bold;
    }

    /* Bouton Modifier (Enregistrer) */
    .btn-submit {
        background-color: #28A745; /* Vert pour succès/validation */
        color: white;
    }
    .btn-submit:hover { background-color: #1e7e34; }

    /* Bouton Supprimer (Danger) */
    .btn-delete {
        background-color: #DC3545; /* Rouge pour danger */
        color: white;
    }
    .btn-delete:hover {
        background-color: #C82333;
    }
</style>

</body>
</html>