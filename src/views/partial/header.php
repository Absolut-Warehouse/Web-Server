<header class="site-header">
    <div class="header-content">
        <div class="box">
            <h1 class="logo"><a href="/"><?= htmlspecialchars($companyName ?? 'Orange Box') ?></a></h1>
            <nav class="nav">
                <ul class="nav-menu">
                    <li class="dropdown">
                        <a href="#signin"><?= $data["header"]["myaccount"] ?></a>
                        <div class="dropdown-content">
                            <a href="/signup"><?= $data["header"]["signup"] ?></a>
                            <a href="/signin"><?= $data["header"]["signin"] ?></a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#settings"><?= $data["header"]["language"] ?></a>
                        <div class="dropdown-content">
                            <a href="#preferences"><?= $data["header"]["english"] ?></a>
                            <a href="#security"><?= $data["header"]["french"] ?></a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>

        <hr>


        <div class="queue">
            <nav class="nav-block">
                <a href="/mission"><?= $data["header"]["mission"] ?></a>
                <a href="/team"><?= $data["header"]["team"] ?></a>
                <a href="/resources/L3-I-S5-projet_BD_reseau-2025-2026.pdf"><?= $data["header"]["subject"] ?></a>
            </nav>

            <nav class="nav-block">
                <a href="/tech"><?= $data["header"]["tech"] ?></a>
            </nav>
        </div>

    </div>
</header>
