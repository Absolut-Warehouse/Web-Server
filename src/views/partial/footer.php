<footer class="site-footer">

    <hr>

    <section class="site-links">
        <div class="container">
            <div class="column">
                <h3><?= $data["footer"]["contact"] ?></h3>
                <a href="/FAQ"><?= $data["footer"]["FAQ"] ?></a>
                <a href="/contact"><?= $data["footer"]["contact_list"] ?></a>
            </div>
            <div class="column">
                <h3><?= $data["footer"]["network"] ?></h3>
                <a href="https://github.com/Orange-Box-Warehouse"><?= $data["footer"]["github"] ?></a>
            </div>

            <div class="column">
                <h3><?= $data["footer"]["linkedin"] ?></h3>
                <a href="https://www.linkedin.com/in/gauthier-defrance/">Gauthier</a>
                <a href="https://www.linkedin.com/in/thomas-hornung-365ab8381/">Thomas</a>
                <a href="#linkedin">Haohan</a>
            </div>
        </div>
    </section>

    <hr>

    <div class="container">
        <small>&copy; <?= date('Y') ?> <?= htmlspecialchars($companyName ?? 'LivraRapide') ?> — <?= $data["footer"]["right_reserved"] ?></small>
    </div>

</footer>