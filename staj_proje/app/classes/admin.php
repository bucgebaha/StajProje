<?php

class Admin
{
    public static function login($data)
    {
        $_SESSION['admin_id'] = $data['user_id'];
        $_SESSION['admin_name'] = $data['user_name'];
        $_SESSION['admin_login'] = 1;
    }
}
