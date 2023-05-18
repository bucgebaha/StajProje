<?php require admin_view('static/header'); ?>

<div class="box-">
    <h1>
        Ayarlar
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="box-">
    <form action="" method="post" class="form label">
        <ul>
            <li>
                <label for="title">Site Başlığı</label>
                <div class="form-content">
                    <input type="text" name="settings[title]" value="<?= setting('title') ?>">
                </div>
            </li>
            <li>
                <label for="title">Site Açıklaması</label>
                <div class="form-content">
                    <input type="text" name="settings[description]" value="<?= setting('description') ?>">
                </div>
            </li>
            <li>
                <label for="title">Site Anahtar Kelimeler</label>
                <div class="form-content">
                    <input type="text" name="settings[keywords]" value="<?= setting('keywords') ?>">
                </div>
            </li>
            <li>
                <label for="title">Site Teması</label>
                <div class="form-content">
                    <select name="settings[theme]">
                        <option value="">- Tema Seç -</option>
                        <?php foreach ($themes as $theme) : ?>
                            <option <?= setting('theme') == $theme ? 'selected' : null ?> value="<?= $theme ?>"><?= $theme ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </li>
        </ul>
        <h1>Bakım Modu Ayarları</h1>
        <div class="clear" style="height: 10px;"></div>
        <ul>
            <li>
                <label for="title">Bakım Modu</label>
                <div class="form-content">
                    <select name="settings[maintenance_mode]">
                        <option <?= setting('maintenance_mode') == 1 ? 'selected' : null ?> value="1">Açık</option>
                        <option <?= setting('maintenance_mode') == 2 ? 'selected' : null ?> value="2">Kapalı</option>
                    </select>
                </div>
            </li>
            <li>
                <label for="title">Bakım Modu Başlığı</label>
                <div class="form-content">
                    <input type="text" name="settings[maintenance_mode_title]" value="<?= setting('maintenance_mode_title') ?>">
                </div>
            </li>
            <li>
                <label for="title">Bakım Modu Açıklaması</label>
                <div class="form-content">
                    <textarea name="settings[maintenance_mode_desc]" rows="5" cols="30"><?= setting('maintenance_mode_desc') ?></textarea>
                </div>
            </li>
        </ul>
        <h1>Tema Ayarları</h1>
        <div class="clear" style="height: 10px;"></div>
        <ul>
            <li>
                <label for="title">Logo Başlığı</label>
                <div class="form-content">
                    <input type="text" name="settings[logo]" value="<?= setting('logo') ?>">
                </div>
            </li>
            <li>
                <label for="title">Arama Kutusu Metni</label>
                <div class="form-content">
                    <input type="text" name="settings[search_placeholder]" value="<?= setting('search_placeholder') ?>">
                </div>
            </li>
            <li>
                <label for="title">Hoş Geldin Başlığı</label>
                <div class="form-content">
                    <input type="text" name="settings[welcome_title]" value="<?= setting('welcome_title') ?>">
                </div>
            </li>
            <li>
                <label for="title">Hoş Geldin Açıklaması</label>
                <div class="form-content">
                    <textarea name="settings[welcome_desc]" rows="5" cols="30"><?= setting('welcome_desc') ?></textarea>
                </div>
            </li>
            <li>
                <label for="title">Footer Hakkımızda Yazısı</label>
                <div class="form-content">
                    <textarea name="settings[about]" rows="5" cols="30"><?= setting('about') ?></textarea>
                </div>
            </li>
            <li>
                <label for="title">Şirket Kuruluş Tarihi</label>
                <div class="form-content">
                    <input type="text" name="settings[founding_date]" value="<?= setting('founding_date') ?>">
                </div>
            </li>
            <li>
                <label for="title">Facebook Kullanıcı Adı</label>
                <div class="form-content">
                    <input type="text" name="settings[facebook]" value="<?= setting('facebook') ?>">
                </div>
            </li>
            <li>
                <label for="title">Twitter Kullanıcı Adı</label>
                <div class="form-content">
                    <input type="text" name="settings[twitter]" value="<?= setting('twitter') ?>">
                </div>
            </li>
            <li>
                <label for="title">Instagram Kullanıcı Adı</label>
                <div class="form-content">
                    <input type="text" name="settings[instagram]" value="<?= setting('instagram') ?>">
                </div>
            </li>
            <li>
                <label for="title">LinkedIn Kullanıcı Adı</label>
                <div class="form-content">
                    <input type="text" name="settings[linkedin]" value="<?= setting('linkedin') ?>">
                </div>
            </li>
            
        </ul>
        <ul>
            <li class="submit">
                <input type="hidden" name="submit" value="1">
                <button type="submit">Ayarları Kaydet</button>
            </li>
        </ul>
    </form>
</div>

<?php require admin_view('static/footer'); ?>