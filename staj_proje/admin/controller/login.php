<?php

if (post('submit')) {
    #formdan aldığın bilgileri değişkenlere ata
    $username = post('user_name');
    $password = post('user_password');
    #form alanlarını kontrol et
    if (!$username)
        $error = "Lütfen kullanıcı adınızı yazın!";
    elseif (!$password)
        $error = "Lütfen şifrenizi girin!";
    else {
        # Üye varlık kontrolü
        $query = $db->prepare('SELECT * FROM users WHERE user_name = :username');
        $query->execute([
            'username' => $username
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            # Üye var ise parola kontrolü
            $password_verify = password_verify($password, $row['user_password']);

            if ($password_verify) {
                if ($row['user_rank'] == 3)
                    $error = 'Erişim reddedildi';
                else {
                    $success = 'Giriş Başarılı.';
                    Admin::Login($row);

                    header('Location:' . admin_url());
                }
            } else
                $error = 'Hatalı şifre!';
        } else {
            $error = 'Böyle bir kullanıcı kayıtlı değil.';
        }
    }
}
require admin_view('login');
