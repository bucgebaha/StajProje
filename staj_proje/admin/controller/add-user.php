<?php

if (post('submit')) {
    $username = post('username');
    $email = post('email');
    $pass = post('pass');
    $rank = post('rank');

    if (!$username || !$pass || !$email) {
        $error = 'Kullanıcı bilgilerini giriniz!';
    } else {
        $query = $db->prepare('SELECT user_name FROM users WHERE user_name = :username');
        $query->execute([
            'username' => $username
        ]);
        $row = $query->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $error = 'Bu kullanıcı adı kullanılmaktadır!';
        } else {
            $row = null;
            $query = $db->prepare('SELECT user_email FROM users WHERE user_email = :email');
            $query->execute([
                'email' => $email
            ]);
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $error = 'Bu email kullanılmaktadır!';
            } else {

                // kullancıyı veritabanına ekle
                $query = $db->prepare('INSERT INTO users SET user_rank = :rank, user_name = :username, user_email = :email, user_password = :pass, user_url = :userurl');
                $result = $query->execute([
                    'username' => $username,
                    'email' => $email,
                    'userurl' => permalink($username),
                    'pass' => password_hash($pass, PASSWORD_DEFAULT),
                    'rank' => $rank
                ]);

                if ($result) {
                    header('Location:' . admin_url('users'));
                } else {
                    $error = 'Bir sorun oluştu ve kullanıcı eklenemedi!';
                }
            }
        }
    }
}

require admin_view('add-user');
