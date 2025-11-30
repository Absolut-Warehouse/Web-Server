<?php
// Les données proviennent de EmployeeController::createForm()
$positions = $data['positions'] ?? ['Gestionnaire', 'Répartiteur', 'Livreur'];
$sexes = $data['sexes'] ?? ['H', 'F', 'N']; // Bien que le sexe ne soit pas créé, il est souvent utile pour l'UI

// Récupération des messages d'erreur de l'URL si besoin
$error_message = $_GET['error'] ?? null;
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

        <h1>➕ Ajouter un nouvel employé (Association de compte)</h1>

        <p class="description">
            Veuillez fournir l'email d'un utilisateur existant pour l'associer à un rôle d'employé,
            puis définissez ses informations d'emploi.
        </p>

        <?php if ($error_message): ?>
            <div class="alert alert-danger">
                Erreur lors de la création : <?= htmlspecialchars(urldecode($error_message)) ?>
            </div>
        <?php endif; ?>

        <hr>

        <form action="/employee/create" method="POST">

            <h2>Compte Utilisateur</h2>

            <div class="form-group">
                <label for="email">Email de l'utilisateur existant :</label>
                <input type="email" id="email" name="email"
                       placeholder="Ex: nom.prenom@entreprise.com"
                       required
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                <small class="form-hint">Cet utilisateur doit déjà exister dans la base de données.</small>
            </div>

            <hr>

            <h2>Informations d'Emploi</h2>

            <div class="form-group">
                <label for="position">Poste / Rôle :</label>
                <select id="position" name="position" required>
                    <option value="">-- Sélectionnez un poste --</option>
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
                <label for="hire_date">Date de recrutement :</label>
                <input type="date" id="hire_date" name="hire_date"
                       value="<?= htmlspecialchars($_POST['hire_date'] ?? date('Y-m-d')) ?>"
                       required>
            </div>

            <div class="form-actions">
                <a href="/manage" class="btn-cancel">Annuler</a>
                <button type="submit" class="btn-submit">✅ Ajouter l'employé</button>
            </div>
        </form>
    </div>
</main>

<?= view("partial/footer", $data) ?>

<style>
    /* Style général du conteneur de formulaire */
    .form-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h1 {
        font-size: 1.8em;
        color: #333;
        border-bottom: 2px solid #EEE;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    h2 {
        font-size: 1.3em;
        color: #555;
        margin-top: 25px;
        margin-bottom: 15px;
    }
    .description {
        color: #6c757d;
        font-style: italic;
        margin-bottom: 20px;
    }
    /* Alerte pour les erreurs */
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
    /* Styles des groupes de champs */
    .form-group { margin-bottom: 20px; }
    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }
    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 1em;
    }
    .form-hint {
        display: block;
        margin-top: 5px;
        font-size: 0.9em;
        color: #6c757d;
    }
    /* Styles des boutons d'action */
    .form-actions {
        margin-top: 30px;
        display: flex;
        justify-content: flex-end; /* Alignement à droite */
        gap: 10px;
    }
    .btn-submit,
    .btn-cancel {
        border: none;
        padding: 12px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s;
        font-weight: bold;
        text-decoration: none; /* Pour le bouton Annuler (a) */
        display: inline-block;
        text-align: center;
    }
    .btn-submit {
        background-color: #007bff; /* Bleu primaire */
        color: white;
    }
    .btn-submit:hover { background-color: #0056b3; }

    .btn-cancel {
        background-color: #6c757d; /* Gris pour annuler */
        color: white;
    }
    .btn-cancel:hover { background-color: #5a6268; }
</style>

</body>
</html>