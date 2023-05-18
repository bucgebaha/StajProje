<?php require view('static/header') ?>

<div class="row justify-content-md-center mt-4">
    <div class="col-md-4">
        <form action="" method="post">
            <h3 class="mb-3">Bilet oluştur</h3>
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
                <label for="username">Bilet Başlığı</label>
                <input  type="text" class="form-control" name="title" value="<?= post('title') ?>" id="username" placeholder="Sorununuzu özetleyen bir başlık seçin..">
            </div>
            <div class="form-group">
                <label for="password">Bilet Açıklaması</label>
                <div class="form-control">
                    <textarea value="<?= post('desc') ?>" style="resize: none;" class="publisher-input" name="desc" rows="4" cols="70" placeholder="Sorununuzu açıklayın..."></textarea>
                </div>
            </div>
            <input type="hidden" name="submit" value="1">
            <button type="submit" class="btn btn-primary">Oluştur</button>
        </form>
    </div>

</div>

<?php require view('static/footer') ?>