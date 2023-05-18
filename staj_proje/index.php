<?php

require __DIR__ . '/app/init.php';

#URI'daki yolu bir diziye ata.
$routeExplode = explode('?', $_SERVER['REQUEST_URI']);
$route = array_values(array_filter(explode('/', $routeExplode[0])));

#alt dizinde çalışılıyorsa ilk elemanı sil.
if(SUBFOLDER === true){
    array_shift($route);
}

#eğer ana dizinden sonra bir yol yoksa ilk değer olarak index ata
if(!route(0)){
    $route[0] = 'index';
}

#eğer girili controller yoksa ilk değere 404 ata.
if(!file_exists(controller(route(0)))){
    $route[0] = '404';
}

if (setting('maintenance_mode') == 1 && $route[0] != 'admin'){
    $route[0] = 'maintenance-mode';
}

#route[0]'daki controller'ı dahil et.
require controller(route(0));