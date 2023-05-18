<?php
session_start();
ob_start();

#Parametre ile gelen sınıf dosyasını dahil et.
function loadClasses($className){
    require __DIR__ . '/classes/' . strtolower($className) . '.php';
}

spl_autoload_register('loadClasses');

$config = require __DIR__ . '/config.php';

#Veritabanı bağlantısını gerçekleştir.
try {
    $db = new PDO('mysql:host=' . $config['db']['host'] . 
            ';dbname=' .    $config['db']['name'],
                            $config['db']['user'] .
                            $config['db']['pass']);
}catch(PDOException $e){
    #Hata oluşursa hata mesajı döndür ve çık.
    die($e->getMessage());
}

require __DIR__ . '/settings.php';

#helper klasöründeki tüm dosyaları dahil et.
foreach (glob(__DIR__ . '/helper/*.php') as $helperFile){
    require $helperFile;
}