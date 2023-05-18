<?php

define('PATH', realpath('.'));
define('SUBFOLDER', true);
define('URL', 'http://localhost/Staj_proje');

#Veritabanı bilgilerini döndür.
return[
    'db' => [
        'name' => 'bilet',
        'host' => 'localhost',
        'user' => 'root',
        'pass' => ''
    ]
];