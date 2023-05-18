<?php

$meta = [
    'title' => "Giriş Yap"
];

if(!empty(get('error'))) $error = get('error');

if (post('submit')) {
    #formdan aldığın bilgileri değişkenlere ata
    $username = post('username');
    $password = post('password');

    #form alanlarını kontrol et
    if (!$username)
        $error = "Lütfen kullanıcı adınızı yazın!";
    elseif (!$password)
        $error = "Lütfen şifrenizi girin!";
    else{
        # Üye varlık kontrolü
        $query = $db->prepare('SELECT * FROM users WHERE user_name = :username');
        $query->execute([
            'username' => $username
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);

        if($row){
            # Üye var ise parola kontrolü
            $password_verify = password_verify($password, $row['user_password']);
            
            if($password_verify){
                $success = 'Giriş Başarılı.';
                User::Login($row);

                header('Refresh:2;url=' . site_url());
            }else
                $error = 'Hatalı şifre!'; 
        }else{
            $error = 'Böyle bir kullanıcı kayıtlı değil.';
        }
    }
}

require view('login');