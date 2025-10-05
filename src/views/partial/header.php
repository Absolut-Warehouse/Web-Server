<header class="site-header">
    <div class="header-content">
        <div class="box">
            <h1 class="logo"><a href="/"><?= htmlspecialchars($companyName ?? 'Orange Box') ?></a></h1>
            <nav class="nav">
                <ul class="nav-menu">
                    <li class="dropdown">
                        <a href="#signin">Mon compte</a>
                        <div class="dropdown-content">
                            <a href="/signup">S'inscrire</a>
                            <a href="/signin">Se connecter</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#settings">Language</a>
                        <div class="dropdown-content">
                            <a href="#preferences">Anglais</a>
                            <a href="#security">Français</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>

        <hr>


        <div class="queue">
            <nav class="nav-block">
                <a href="/mission">Objectif</a>
                <a href="/team">Notre équipe</a>
                <a href="/resources/L3-I-S5-projet_BD_reseau-2025-2026.pdf">Sujet</a>
            </nav>

            <nav class="nav-block">
                <a href="/tech">Technique</a>
            </nav>
        </div>

    </div>
</header>
