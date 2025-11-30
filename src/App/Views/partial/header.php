<?php
use Core\Auth;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$config = require BASE_PATH . '/App/Config/config.php';
$companyName = $config['app_info']['company_name'];

// Initialiser $user pour qu'il soit disponible même après le premier if
$user = Auth::check() ? Auth::user() : null;
?>

<header class="site-header">
    <div class="header-content">
        <div class="box">
            <h1 class="logo">
                <a href="/">
                    <img alt="Logo" src="<?= base_url('/resources/cardbox.ico') ?>" />
                    <?= htmlspecialchars($companyName) ?>
                </a>
            </h1>
            <nav class="nav">
                <ul class="nav-menu">
                    <!-- Mon compte -->
                    <li class="dropdown">
                        <?php if (Auth::check() && $user): ?>
                            <a href="#account">
                                <i class="fa-solid fa-user"></i>
                                <?= $data['lang']["header"]["myaccount"] ?>
                            </a>
                            <div class="dropdown-content">
                                <a href="/account"><?= $data['lang']["header"]["myaccount"] ?></a>
                                <a href="/orders"><?= $data['lang']["header"]["myorders"] ?? "Mes commandes" ?></a>
                                <a href="/logout">Se déconnecter</a>
                            </div>
                        <?php else: ?>
                            <a href="#signin">
                                <i class="fa-solid fa-user"></i>
                                <?= $data['lang']["header"]["myaccount"] ?>
                            </a>
                            <div class="dropdown-content">
                                <a href="/signup"><?= $data['lang']["header"]["signup"] ?></a>
                                <a href="/signin"><?= $data['lang']["header"]["signin"] ?></a>
                            </div>
                        <?php endif; ?>
                    </li>

                    <!-- Menu employé (si connecté et employé) -->
                    <?php if (Auth::check() && $user && $user->isEmployee()): ?>
                        <li class="dropdown">
                            <a href="#employee">
                                <i class="fa-solid fa-briefcase"></i>
                                <?= $data['lang']["header"]["employee_menu"] ?? "Espace Employé" ?>
                            </a>
                            <div class="dropdown-content">
                                <a href="/dashboard"><?= $data['lang']["header"]["dashboard"] ?? "Menu Employée" ?></a>
                                <a href="/package_list"><?= $data['lang']["header"]["dashboard"] ?? "Listes des packages" ?></a>
                                <?php
                                if ($user->isManager()):
                                    ?>
                                    <a href="/manage"><?= $data['lang']["header"]["dashboard"] ?? "Gestion Des Employés" ?></a>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endif; ?>

                    <!-- Menu langue -->
                    <li class="dropdown">
                        <a href="#settings">
                            <i class="fa-solid fa-language"></i>
                            <?= $data['lang']["header"]["language"] ?>
                        </a>
                        <div class="dropdown-content">
                            <a href="/lang?lang=en"><span class="fi fi-us"></span> <?= $data['lang']["header"]["english"] ?></a>
                            <a href="/lang?lang=fr"><span class="fi fi-fr"></span> <?= $data['lang']["header"]["french"] ?></a>
                            <a href="/lang?lang=zh"><span class="fi fi-cn"></span> <?= $data['lang']["header"]["chinese"] ?></a>
                            <a href="/lang?lang=de"><span class="fi fi-de"></span> <?= $data['lang']["header"]["german"] ?></a>
                            <a href="/lang?lang=es"><span class="fi fi-es"></span> <?= $data['lang']["header"]["spanish"] ?></a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>

        <hr>


        <div class="queue">
            <nav class="nav-block">
                <a href="/mission">
                    <i class="fa-solid fa-bullseye"></i>
                    <?= $data['lang']["header"]["mission"] ?>
                </a>


                <a href="/team">
                    <i class="fa-solid fa-people-group"></i>
                    <?= $data['lang']["header"]["team"] ?>
                </a>


                <a href="/resources/L3-I-S5-projet_BD_reseau-2025-2026.pdf">
                    <i class="fa-solid fa-paperclip"></i>
                    <?= $data['lang']["header"]["subject"] ?>
                </a>
            </nav>

            <nav class="nav-block">
                <a href="/tech">
                    <i class="fa-solid fa-gears"></i>
                    <?= $data['lang']["header"]["tech"] ?>
                </a>
            </nav>
        </div>

    </div>
</header>