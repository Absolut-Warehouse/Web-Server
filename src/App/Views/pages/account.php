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

    <?php
    // Récupère l'objet User et l'adresse depuis $data
    /** @var \App\Models\User $user */
    $user = $data['user'] ?? null;
    $address = $data['address'] ?? null;
    ?>

    <!-- --- Profil utilisateur --- -->
    <section class="main-content form-section">
        <div class="current-info">
            <h2><?= $data['lang']['account']['content']['profile_title'] ?></h2>
            <p><strong><?= $data['lang']['account']['content']['label_name'] ?> :</strong> <?= htmlspecialchars($user->user_nom ?? '') ?></p>
            <p><strong><?= $data['lang']['account']['content']['label_firstname'] ?> :</strong> <?= htmlspecialchars($user->user_prenom ?? '') ?></p>
            <p><strong><?= $data['lang']['account']['content']['label_email'] ?> :</strong> <?= htmlspecialchars($user->getEmail() ?? '') ?></p>
            <p><strong><?= $data['lang']['account']['content']['label_phone'] ?> :</strong> <?= htmlspecialchars($user->user_phone_number ?? '') ?></p>
            <p><strong><?= $data['lang']['account']['content']['label_gender'] ?> :</strong> <?= htmlspecialchars($user->sexe ?? '') ?></p>
        </div>

        <form class="form" action="/account/update_profile" method="POST">
            <input type="text" name="user_nom" value="<?= htmlspecialchars($user->user_nom ?? '') ?>" placeholder="<?= $data['lang']['account']['content']['label_name'] ?>">
            <input type="text" name="user_prenom" value="<?= htmlspecialchars($user->user_prenom ?? '') ?>" placeholder="<?= $data['lang']['account']['content']['label_firstname'] ?>">
            <input type="text" name="user_phone_number" value="<?= htmlspecialchars($user->user_phone_number ?? '') ?>" placeholder="<?= $data['lang']['account']['content']['label_phone'] ?>">

            <select name="sexe">
                <option value=""><?= $data['lang']['account']['content']['label_gender'] ?></option>
                <option value="H" <?= ($user->sexe ?? '') === 'H' ? 'selected' : '' ?>><?= $data['lang']['account']['content']['gender_male'] ?></option>
                <option value="F" <?= ($user->sexe ?? '') === 'F' ? 'selected' : '' ?>><?= $data['lang']['account']['content']['gender_female'] ?></option>
                <option value="N" <?= ($user->sexe ?? '') === 'N' ? 'selected' : '' ?>><?= $data['lang']['account']['content']['gender_other'] ?></option>
            </select>

            <button class="btn btn-primary" type="submit"><?= $data['lang']['account']['content']['update_profile_btn'] ?></button>
        </form>
    </section>

    <!-- --- Adresse --- -->
    <section class="main-content form-section">
        <div class="current-info">
            <h2><?= $data['lang']['account']['content']['address_title'] ?></h2>
            <p><?= htmlspecialchars(($address['complementary'] ?? '') . " " . ($address['street'] ?? '')) ?: $data['lang']['account']['content']['no_address_defined'] ?></p>
            <p><?= htmlspecialchars($address['city'] ?? '') ?: $data['lang']['account']['content']['no_address_defined'] ?></p>
            <p><?= htmlspecialchars($address['postal_code'] ?? '') ?: $data['lang']['account']['content']['no_address_defined'] ?></p>
            <p><?= htmlspecialchars($address['country'] ?? '') ?: $data['lang']['account']['content']['no_address_defined'] ?></p>
        </div>

        <form class="form" action="/account/update_address" method="POST">
            <input type="text" name="address_line1" placeholder="<?= $data['lang']['account']['content']['address_line1'] ?>" value="<?= htmlspecialchars($address['complementary'] ?? '') ?>">
            <input type="text" name="address_line2" placeholder="<?= $data['lang']['account']['content']['address_line2'] ?>" value="<?= htmlspecialchars($address['street'] ?? '') ?>">
            <input type="text" name="city" placeholder="<?= $data['lang']['account']['content']['city'] ?>" value="<?= htmlspecialchars($address['city'] ?? '') ?>">
            <input type="text" name="postal_code" placeholder="<?= $data['lang']['account']['content']['postal_code'] ?>" value="<?= htmlspecialchars($address['postal_code'] ?? '') ?>">
            <input type="text" name="country" placeholder="<?= $data['lang']['account']['content']['country'] ?>" value="<?= htmlspecialchars($address['country'] ?? '') ?>">
            <button class="btn btn-primary" type="submit"><?= $data['lang']['account']['content']['update_address_btn'] ?></button>
        </form>
    </section>

    <!-- --- Suppression du compte --- -->
    <section class="main-content form-section">
        <form class="form" action="/account/delete" method="POST" onsubmit="return confirm('<?= $data['lang']['account']['content']['delete_account_confirm'] ?>');">
            <button class="btn btn-danger" type="submit"><?= $data['lang']['account']['content']['delete_account_btn'] ?></button>
        </form>
    </section>

</main>

<?= view("partial/footer", $data) ?>
</body>
</html>
