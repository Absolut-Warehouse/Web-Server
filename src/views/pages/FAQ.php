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
        <h2>Comment suivre ma commande ?</h2>
        <p>Une fois votre commande expédiée, vous recevrez un numéro de suivi par e-mail. Vous pouvez l’utiliser sur notre site pour suivre l’état de votre livraison en temps réel.</p>
    </section>

    <section class="main-content">
        <h2>Quels sont les délais de livraison ?</h2>
        <p>Les délais dépendent de votre emplacement et du mode de livraison choisi. En général, les commandes standard arrivent sous 3 à 5 jours ouvrés, tandis que la livraison express arrive sous 24 à 48 heures.</p>
    </section>

    <section class="main-content">
        <h2>Puis-je modifier mon adresse de livraison ?</h2>
        <p>Oui, tant que votre commande n’a pas encore été expédiée. Connectez-vous à votre compte et modifiez l’adresse dans la section "Mes commandes".</p>
    </section>

    <section class="main-content">
        <h2>Que faire si ma commande est endommagée ?</h2>
        <p>Contactez notre service client dans les 48 heures suivant la réception. Nous vous proposerons un échange ou un remboursement selon la situation.</p>
    </section>

    <section class="main-content">
        <h2>Quels sont les frais de livraison ?</h2>
        <p>Les frais varient selon le poids, la taille de votre colis et la distance de livraison. Ils sont indiqués clairement lors du paiement.</p>
    </section>

    <section class="main-content">
        <h2>Puis-je annuler ma commande ?</h2>
        <p>Vous pouvez annuler votre commande tant qu’elle n’a pas encore été expédiée. Après expédition, veuillez suivre la procédure de retour.</p>
    </section>
</main>


<?= view("partial/footer") ?>
</body>
</html>