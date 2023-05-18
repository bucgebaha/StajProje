<?php

#route[1] boşsa, yani bir view yoksa
#index sayfasına yönlendirmek için 1. değere atama yap.
if(!route(1)){
    $route[1] = 'index';
}

#route[1]'de tanımlı view dosyası yoksa
#index sayfasına yönlendirmek için 1. değere atama yap.
if(!file_exists(admin_controller(route(1)))){
    $route[1] = 'index';
}

if(!session('admin_login')){
    $route[1] = 'login';
}

$menus = [
    'index' => [
        'title' => 'Anasayfa',
        'icon' => 'tachometer'
    ],
    'users' => [
        'title' => 'Üyeler',
        'icon' => 'user',
        'submenu' => [
            'add-user' => 'Üye Ekle',
            'users' => 'Üyeleri Listele'
        ]
    ],
    'tickets' => [
        'title' => 'Biletler',
        'icon' => 'tags'
    ],
    'settings' => [
        'title' => 'Ayarlar',
        'icon' => 'cog'
    ],
    'menu' => [
        'title' => 'Menü Yönetimi',
        'icon' => 'bars'
    ],
    'logout' => [
        'title' => 'Çıkış Yap',
        'icon' => 'sign-out'
    ]
];

#route[1]'de tanımlı controller'ı çağır.
require admin_controller(route(1));