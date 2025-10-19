<?php
$config = include __DIR__ . '/../../Config/config.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/account.css') ?>">
</head>
<body>

<?= view("partial/header", $data) ?>

<main class="account-page">

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error'] ?>
        </div>
        <?php unset($_SESSION['error']); // on efface le message après affichage ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <section class="main-content form-section">
        <div class="current-info">
            <h2>Profil utilisateur</h2>
            <p><strong>Nom :</strong> <?= htmlspecialchars($content['user_nom']) ?></p>
            <p><strong>Prénom :</strong> <?= htmlspecialchars($content['user_prenom']) ?></p>
            <p><strong>Email :</strong> <?= htmlspecialchars($content['email']) ?></p>
            <p><strong>Téléphone :</strong> <?= htmlspecialchars($content['user_phone_number']) ?></p>
            <p><strong>Sexe :</strong> <?= htmlspecialchars($content['sexe']) ?></p>
        </div>

        <form class="form" action="/account/update_profile" method="POST">
            <input type="text" name="user_nom" value="<?= htmlspecialchars($content['user_nom']) ?>" placeholder="Nom">
            <input type="text" name="user_prenom" value="<?= htmlspecialchars($content['user_prenom']) ?>" placeholder="Prénom">
            <input type="text" name="user_phone_number" value="<?= htmlspecialchars($content['user_phone_number'] ?? '') ?>" placeholder="Numéro de téléphone">
            <select name="sexe">
                <option value="">Sélectionner le sexe</option>
                <option value="H" <?= ($content['sexe'] ?? '') === 'H' ? 'selected' : '' ?>>Homme</option>
                <option value="F" <?= ($content['sexe'] ?? '') === 'F' ? 'selected' : '' ?>>Femme</option>
                <option value="N" <?= ($content['sexe'] ?? '') === 'N' ? 'selected' : '' ?>>Autre</option>
            </select>
            <button class="btn btn-primary" type="submit">Mettre à jour</button>
        </form>
    </section>

    <!-- --- Adresse --- -->
    <section class="main-content form-section">
        <div class="current-info">
            <h2>Adresse</h2>
            <p><?= htmlspecialchars($content['address'] ?? 'Non définie') ?></p>
        </div>

        <form class="form" action="/account/update_address" method="POST">
            <input type="text" name="address_line1" placeholder="Adresse ligne 1" value="<?= htmlspecialchars($content['address_line1'] ?? '') ?>">
            <input type="text" name="address_line2" placeholder="Adresse ligne 2" value="<?= htmlspecialchars($content['address_line2'] ?? '') ?>">
            <input type="text" name="city" placeholder="Ville" value="<?= htmlspecialchars($content['city'] ?? '') ?>">
            <input type="text" name="postal_code" placeholder="Code postal" value="<?= htmlspecialchars($content['postal_code'] ?? '') ?>">
            <input type="text" name="country" placeholder="Pays" value="<?= htmlspecialchars($content['country'] ?? '') ?>">
            <button class="btn btn-primary" type="submit">Mettre à jour l'adresse</button>
        </form>
    </section>

    <!-- --- Suppression du compte --- -->
    <section class="main-content form-section">
        <form class="form" action="/account/delete" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer votre compte ?');">
            <button class="btn btn-danger" type="submit">Supprimer mon compte</button>
        </form>
    </section>

</main>

<?= view("partial/footer", $data) ?>
</body>
</html>
