<?php require admin_view('static/header'); ?>

<div class="box-">
    <h1>
        Biletler
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="table">
    <table>
        <thead>
            <tr>
                <th>Bilet ID</th>
                <th>Bilet Başlığı</th>
                <th>Bilet Sahibi</th>
                <th>Bilet Durumu</th>
                <th class="hide">Bilet Oluşturulma Tarihi</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td>
                        <?= $row['ticket_id'] ?>
                    </td>
                    <td>
                        <?= $row['ticket_title'] ?>
                    </td>
                    <td>
                        <?php 
                            $query2 = $db->prepare('SELECT * FROM users WHERE user_id = :id');
                            $query2->execute([
                                'id' => $row['ticket_owner_id']
                            ]);
                            $row2 = $query2->fetch(PDO::FETCH_ASSOC);
                            echo $row2['user_name'];
                        ?>
                    </td>
                    <td>
                        <?= ticket_status($row['ticket_status']) ?>
                    </td>
                    <td>
                        <?= $row['ticket_date'] ?>
                    </td>
                    <td>
                    <a href="<?=admin_url('show-ticket?id=' . $row['ticket_id'])?>" class="btn">Görüntüle</a>
                    <a href="<?=admin_url('close-ticket?id=' . $row['ticket_id'])?>" class="btn">Tamamlandı</a>
                        <a href="<?= admin_url('delete?table=tickets&column=ticket_id&id=' . $row['ticket_id']) ?>" class="btn">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require admin_view('static/footer'); ?>