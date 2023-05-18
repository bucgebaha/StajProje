<?php require view('static/header'); ?>

<div class="clear" style="height: 10px;"></div>

<div class="container">
    <div class="box-">
        <h1>
            Biletlerim

        </h1>
        <a href="<?= site_url('create-ticket') ?>">Bilet Oluştur</a>
        <?php if ($count > 0) : ?>
            <div class="alert alert-warning" role="alert">
                Yanıtlanan biletiniz var!
            </div>
        <?php endif; ?>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Bilet Başlığı</th>
                    <th>Bilet Durumu</th>
                    <th class="hide">Bilet Oluşturulma Tarihi</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td>
                            <?= $row['ticket_title'] ?>
                        </td>
                        <td>
                            <?= ticket_status($row['ticket_status']) ?>
                        </td>
                        <td>
                            <?= $row['ticket_date'] ?>
                        </td>
                        <td>
                            <a href="<?= site_url('show-ticket?id=' . $row['ticket_id']) ?>" class="btn">Görüntüle</a>
                            <a href="<?= site_url('delete?table=tickets&column=ticket_id&id=' . $row['ticket_id']) ?>" class="btn">Sil</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require view('static/footer') ?>