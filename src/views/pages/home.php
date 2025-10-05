<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('resources/cardbox.png') ?>" />
    <title><?= htmlspecialchars($title ?? 'Orange Box — Accueil') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<?= view("partial/header") ?>

<main>

    <section class="main-content">
        <h2>Chercher votre colis</h2>
        <p>Retrouvez votre colis en donnant l'id de suivis de votre colis transmis par mail.</p>
        <form action="/search" method="GET">
            <input type="text" name="order" placeholder="Your ID" required>
            <button type="submit">Search Now</button>
        </form>
    </section>


    <section class="main-content">
        <h2>Votre colis est en sécurité</h2>
        <p>Dans les mains de nos employés, votre colis sera en <strong>sécurité</strong>.
            Nous vous livrerons votre colis dans le plus bref délais.
            Vous pouvez consulter les estimations en cherchant votre colis sur votre compte
            ou en insérer simplement l'identifiant de votre colis dans la barre de recherche.
        </p>
        <img src="<?= base_url('resources/entrepot.png') ?>" alt="Image of warehouse">

    </section>


    <section class="main-content contact">
        <h2>Nous retrouver</h2>

        <div class="contact-info">
            <p><strong>Adresse :</strong> 123 Rue de l’Exemple, 75000 Paris, France</p>
            <p><strong>Téléphone :</strong> +33 0 00 00 00 00</p>
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

<?= view("partial/footer") ?>
</body>
</html>