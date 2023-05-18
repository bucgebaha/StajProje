<?php

$meta = [
    'title' => "Kayıt Ol"
];

if (post('submit')) {
    #formdan aldığın bilgileri değişkenlere ata
    $username = post('username');
    $password = post('password');
    $email = post('email');
    $password_again = post('password_again');

    #form alanlarını kontrol et
    if (!$username)
        $error = "Lütfen kullanıcı adınızı yazın!";
    elseif (!$email)
        $error = "Lütfen e-posta adresinizi yazın!";
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        $error = "Geçerli bir e-posta adresini yazın!";
    elseif (!$password || !$password_again)
        $error = "Lütfen şifrenizi girin!";
    elseif($password != $password_again)
        $error = "Girdiğiniz şifreler birbiriyle uyuşmuyor!";
    else{
        #form alanları doluysa kullanıcı adı ve email daha önce kullanılmış mı diye kontrol et.
        $query = $db->prepare('SELECT user_name FROM users WHERE user_name = :username');
        $query->execute([
            'username' => $username
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);

        if($row){
            $error = 'Bu kullanıcı adı kullanılmaktadır!';
        }
        else{
            $query = $db->prepare('SELECT user_email FROM users WHERE user_email = :email');
            $query->execute([
                'email' => $email
            ]);
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if($row){
                $error = 'Bu email kullanılmaktadır!';
            }
            # Üyeyi ekle
            else{
                $result = User::Register([
                    'username' => $username,
                    'url' => permalink($username),
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ]);
            
                if($result){
                    $success = 'Başarıyla kayıt oldunuz!';
                    User::Login([
                        'user_id' => $db->lastInsertId(),
                        'user_name' => $username
                    ]);
                    header('Refresh:2;url=' . site_url());
                }else{
                    $error = 'Beklenmeyen bir sorun oluştu, lütfen daha sonra tekrar deneyin.';
                }
            
            }
        }
    }
}

require view('register');