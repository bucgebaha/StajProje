<?php require admin_view('static/header'); ?>

<div class="box-">
        <h1>
            Üye Listesi
            <a href="<?= admin_url('add-user') ?>">Yeni Ekle</a>
        </h1>
        <?php if (isset($error)) : ?>
                <div class="message error box-">
                    <?= $error ?>
                </div>
            <?php endif; ?>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
                <tr>
                <th>Kullanıcı ID</th>
                    <th>Kullanıcı Adı</th>
                    <th>E-Mail</th>
                    <th>Rütbe</th>
                    <th class="hide">Kayıt Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                <tr>
                <td>
                    <?= $row['user_id'] ?>
                    </td>
                    <td>
                    <?= $row['user_name'] ?>
                    </td>
                    <td>
                        <?= $row['user_email'] ?>
                    </td>
                    <td>
                        <?= user_ranks($row['user_rank']) ?>
                    </td>
                    <td>
                        <?= $row['user_date'] ?>
                    </td>
                    <td>
                        <a href="<?=admin_url('delete-user?id=' . $row['user_id'])?>" class="btn">Sil</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require admin_view('static/footer'); ?>