<?php require view('static/header') ?>

<div class="row justify-content-md-center mt-4">
    <div class="col-md-4">
        <form action="" method="post">
            <h3 class="mb-3">Giriş Yap</h3>
            <?php if ($suc = success()) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $suc ?>
                </div>
            <?php endif; ?>
            <?php if ($err = error()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $err ?>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="username">Kullanıcı Adınız</label>
                <input type="text" class="form-control" name="username" value="<?= post('username') ?>" id="username" placeholder="Kullanıcı adınızı yazın..">
            </div>
            <div class="form-group">
                <label for="password">Şifreniz</label>
                <input type="password" class="form-control" name="password" value="<?= post('password') ?>" id="password" placeholder="*******">
            </div>
            <input type="hidden" name="submit" value="1">
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
    </div>

</div>

<?php require view('static/footer') ?>