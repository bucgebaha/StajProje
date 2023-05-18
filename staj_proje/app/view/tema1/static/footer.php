<div class="container">
    <div class="row">
        <div class="col-md-12">
            <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row">
                    <div class="col-12 col-md">
                        <img class="mb-2" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo-shadow.png" alt="" width="24" height="24">
                        <small class="d-block mb-3 text-muted">© <?= setting('founding_date') . ' - ' . date("Y"); ?></small>
                    </div>
                    <div class="col-12 col-md pr-5">
                        <h5>Hakkımızda</h5>
                        <p class="small">
                            <?= setting('about') ?>
                        </p>
                    </div>
                    <div class="col-12 col-md">
                        <h5>Sosyal Medya</h5>
                        <ul class="list-unstyled text-small">
                            <?php foreach (menu(3) as $key => $menu) : ?>
                                <li>
                                    <a class="text-muted" href="<?= $menu['url'] ?>">
                                        <?= htmlspecialchars_decode($menu['title']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>

</body>

</html>