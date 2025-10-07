<footer class="site-footer">

    <hr>

    <section class="site-links">
        <div class="container">
            <div class="column">
                <h3><?= $data['lang']["footer"]["contact"] ?></h3>
                <a href="/FAQ"><?= $data['lang']["footer"]["FAQ"] ?></a>
                <a href="/contact"><?= $data['lang']["footer"]["contact_list"] ?></a>
            </div>
            <div class="column">
                <h3><?= $data['lang']["footer"]["network"] ?></h3>
                <a href="https://github.com/Orange-Box-Warehouse"><?= $data['lang']["footer"]["github"] ?></a>
            </div>

            <div class="column">
                <h3><?= $data['lang']["footer"]["linkedin"] ?></h3>
                <a href="https://www.linkedin.com/in/gauthier-defrance/">Gauthier</a>
                <a href="https://www.linkedin.com/in/thomas-hornung-365ab8381/">Thomas</a>
                <a href="#linkedin">Haohan</a>
            </div>
        </div>
    </section>

    <hr>

    <div class="container">
        <small>&copy; <?= date('Y') ?> <?= htmlspecialchars($companyName ?? 'LivraRapide') ?> — <?= $data['lang']["footer"]["right_reserved"] ?></small>
    </div>

</footer>