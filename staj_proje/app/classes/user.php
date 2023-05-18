<?php

class User
{
    public static function login($data)
    {
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['user_name'] = $data['user_name'];
    }

    public static function Register($data)
    {
        global $db;
        $query = $db->prepare('INSERT INTO users SET user_name = :username, user_url = :url, user_email = :email, user_password = :password');
        return $query->execute($data);
    }
}
