<footer class="site-footer">

    <hr>

    <section class="site-links">
        <div class="container">
            <div class="column">
                <h3><i class="fa-solid fa-address-book"></i> <?= $data['lang']["footer"]["contact"] ?></h3>
                <a href="/FAQ"><?= $data['lang']["footer"]["FAQ"] ?></a>
                <a href="/contact"><?= $data['lang']["footer"]["contact_list"] ?></a>
            </div>
            <div class="column">
                <h3><?= $data['lang']["footer"]["network"] ?></h3>
                <a href="https://github.com/Orange-Box-Warehouse"><i class="fa-brands fa-github"></i>  <?= $data['lang']["footer"]["github"] ?></a>
            </div>

            <div class="column">
                <h3><i class="fa-brands fa-linkedin"></i> <?= $data['lang']["footer"]["linkedin"] ?></h3>
                <a href="https://www.linkedin.com/in/gauthier-defrance/">Gauthier</a>
                <a href="https://www.linkedin.com/in/thomas-hornung-365ab8381/">Thomas</a>
                <a href="#linkedin">Haohan</a>
            </div>
        </div>
    </section>

    <hr>

    <div class="container">
        <small>Website version <?= WEBSITE_VERSION ?></small>
    </div>

    <div class="container">
        <small>&copy; <?= date('Y') ?> <?= COMPANY_NAME ?> — <?= $data['lang']["footer"]["right_reserved"] ?></small>
    </div>

</footer>