<?php require admin_view('static/header'); ?>

<div class="box- menu-container">
    <h2>Kullanıcı Ekle</h2>
    <form action="" method="post">
        <ul id="menu">
            <li>
                <div class="menu-item">
                    <input value="<?= post('username') ?>" type="text" name="username" placeholder="Kullanıcı Adı">
                    <input value="<?= post('email') ?>" type="text" name="email" placeholder="E-Mail">
                    <input value="<?= post('pass') ?>" type="text" name="pass" placeholder="Şifre">
                    <select value="" name="rank" id="rank">
                        <?php foreach(user_ranks() as $id => $user_rank): ?>
                            <option <?= post('rank') == $user_rank ? 'selected' : null  ?> value="<?=$id?>"><?=$user_rank?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </li>
        </ul>
        <div class="menu-btn">
            <button type="submit" value="1" name="submit">Kaydet</button>
        </div>
    </form>
</div>

<?php require admin_view('static/footer'); ?>