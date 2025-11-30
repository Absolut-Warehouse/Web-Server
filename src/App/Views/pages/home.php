<?php
// inclure le fichier de Config
$config = include __DIR__ . '/../../Config/config.php'; // chemin vers ton fichier de Config

// maintenant $Config['app_info'] est disponible
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?= view("partial/common_head", $data) ?>
    <link rel="stylesheet" href="<?= base_url('/css/animated.css') ?>">

</head>
<body>

<?= view("partial/header", $data) ?>

<main>

    <?php
    $lang = $data['lang'] ?? [];
    $marketing_lang = $lang['home']['content']['marketing_switch'] ?? [];
    $flip_phrases = $marketing_lang['flip_phrases'] ?? [];
    ?>

    <section class="main-content hide">
        <div id="animated_switch">
            <?= htmlspecialchars($marketing_lang['prefix'] ?? 'YOUR PACKAGE') ?>

            <div id="flip">
                <?php if (!empty($flip_phrases)): ?>
                    <?php foreach ($flip_phrases as $phrase): ?>
                        <div><div><?= htmlspecialchars($phrase) ?></div></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div><div>ON TIME</div></div>
                    <div><div>SAFE</div></div>
                    <div><div>ANYWHERE</div></div>
                <?php endif; ?>
            </div>
            <?= htmlspecialchars($marketing_lang['suffix'] ?? 'GUARANTEED!') ?>
        </div>
    </section>

    <section class="main-content">
        <h2><?= $data['lang']["home"]["content"]["package"]["title"] ?></h2>
        <p><?= $data['lang']["home"]["content"]["package"]["text"] ?></p>
        <form action="/search" method="GET">
            <input type="text" name="order" placeholder="<?= $data['lang']["home"]["content"]["package"]["form_placeholder"] ?>" required>
            <button type="submit"><?= $data['lang']["home"]["content"]["package"]["form_button"] ?></button>
        </form>
    </section>


    <section class="main-content">
        <h2><?= $data['lang']["home"]["content"]["security"]["title"] ?></h2>
        <p><?= $data['lang']["home"]["content"]["security"]["text"] ?></p>
        <img src="<?= base_url('/resources/entrepot.png') ?>"
             alt="<?= $data['lang']["home"]["content"]["security"]["alt_img"] ?>">
    </section>


    <section class="main-content contact">
        <h2><?= $data['lang']["home"]["content"]["contact"]["title"] ?></h2>

        <div class="contact-info">
            <p><?= $data['lang']["home"]["content"]["contact"]["text_address"] ?></p>
            <p><?= $data['lang']["home"]["content"]["contact"]["text_phone"] ?></p>
        </div>

        <div class="map">
            <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.999999!2d2.292292!3d48.858844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fdf1!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1696480000000!5m2!1sfr!2sfr"
                    width="80%"
                    height="400px"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>

</main>

<?= view("partial/footer", $data) ?>
</body>
</html>