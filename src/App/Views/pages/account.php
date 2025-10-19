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
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <!-- --- Profil utilisateur --- -->
    <section class="main-content form-section">
        <div class="current-info">
            <h2><?= $lang['account']['content']['profile_title'] ?></h2>
            <p><strong><?= $lang['account']['content']['label_name'] ?> :</strong> <?= htmlspecialchars($content['user_nom']) ?></p>
            <p><strong><?= $lang['account']['content']['label_firstname'] ?> :</strong> <?= htmlspecialchars($content['user_prenom']) ?></p>
            <p><strong><?= $lang['account']['content']['label_email'] ?> :</strong> <?= htmlspecialchars($content['email']) ?></p>
            <p><strong><?= $lang['account']['content']['label_phone'] ?> :</strong> <?= htmlspecialchars($content['user_phone_number']) ?></p>
            <p><strong><?= $lang['account']['content']['label_gender'] ?> :</strong> <?= htmlspecialchars($content['sexe']) ?></p>
        </div>

        <form class="form" action="/account/update_profile" method="POST">
            <input type="text" name="user_nom" value="<?= htmlspecialchars($content['user_nom']) ?>" placeholder="<?= $lang['account']['content']['label_name'] ?>">
            <input type="text" name="user_prenom" value="<?= htmlspecialchars($content['user_prenom']) ?>" placeholder="<?= $lang['account']['content']['label_firstname'] ?>">
            <input type="text" name="user_phone_number" value="<?= htmlspecialchars($content['user_phone_number'] ?? '') ?>" placeholder="<?= $lang['account']['content']['label_phone'] ?>">

            <select name="sexe">
                <option value=""><?= $lang['account']['content']['label_gender'] ?></option>
                <option value="H" <?= ($content['sexe'] ?? '') === 'H' ? 'selected' : '' ?>><?= $lang['account']['content']['gender_male'] ?></option>
                <option value="F" <?= ($content['sexe'] ?? '') === 'F' ? 'selected' : '' ?>><?= $lang['account']['content']['gender_female'] ?></option>
                <option value="N" <?= ($content['sexe'] ?? '') === 'N' ? 'selected' : '' ?>><?= $lang['account']['content']['gender_other'] ?></option>
            </select>

            <button class="btn btn-primary" type="submit"><?= $lang['account']['content']['update_profile_btn'] ?></button>
        </form>
    </section>

    <!-- --- Adresse --- -->
    <section class="main-content form-section">
        <div class="current-info">
            <h2><?= $lang['account']['content']['address_title'] ?></h2>
            <p><?= htmlspecialchars(($content['address_line1'] ?? '') . " " . ($content['address_line2'] ?? '')) ?: $lang['account']['content']['no_address_defined'] ?></p>
            <p><?= htmlspecialchars($content['city'] ?? '') ?: $lang['account']['content']['no_address_defined'] ?></p>
            <p><?= htmlspecialchars($content['postal_code'] ?? '') ?: $lang['account']['content']['no_address_defined'] ?></p>
            <p><?= htmlspecialchars($content['country'] ?? '') ?: $lang['account']['content']['no_address_defined'] ?></p>
        </div>

        <form class="form" action="/account/update_address" method="POST">
            <input type="text" name="address_line1" placeholder="<?= $lang['account']['content']['address_line1'] ?>" value="<?= htmlspecialchars($content['address_line1'] ?? '') ?>">
            <input type="text" name="address_line2" placeholder="<?= $lang['account']['content']['address_line2'] ?>" value="<?= htmlspecialchars($content['address_line2'] ?? '') ?>">
            <input type="text" name="city" placeholder="<?= $lang['account']['content']['city'] ?>" value="<?= htmlspecialchars($content['city'] ?? '') ?>">
            <input type="text" name="postal_code" placeholder="<?= $lang['account']['content']['postal_code'] ?>" value="<?= htmlspecialchars($content['postal_code'] ?? '') ?>">
            <input type="text" name="country" placeholder="<?= $lang['account']['content']['country'] ?>" value="<?= htmlspecialchars($content['country'] ?? '') ?>">
            <button class="btn btn-primary" type="submit"><?= $lang['account']['content']['update_address_btn'] ?></button>
        </form>
    </section>

    <!-- --- Suppression du compte --- -->
    <section class="main-content form-section">
        <form class="form" action="/account/delete" method="POST" onsubmit="return confirm('<?= $lang['account']['content']['delete_account_confirm'] ?>');">
            <button class="btn btn-danger" type="submit"><?= $lang['account']['content']['delete_account_btn'] ?></button>
        </form>
    </section>

</main>


<?= view("partial/footer", $data) ?>
</body>
</html>
