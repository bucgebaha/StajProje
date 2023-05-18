<?php

#Parametredeki admin controller yolunu döndür
function admin_controller($controllerName){
    $controllerName = strtolower($controllerName);
    return PATH . '/admin/controller/' . $controllerName . '.php';
}

#Parametredeki admin view yolunu döndür
function admin_view($viewName){
    return PATH . '/admin/view/' . $viewName . '.php';
}

#-eğer verilmişse parametredeki yol ile- admin ana yolunu döndür
function admin_url($url = false){
    return URL . "/admin/" . $url;
}

#-eğer verilmişse parametredeki yol ile- admin public yolunu döndür
function admin_public_url($url = false){
    return URL . '/admin/public/' . $url;
}

function user_ranks($rankId = null){
    $ranks = [
        1 => 'Yönetici',
        2 => 'Müşteri Hizmet Elemanı',
        3 => 'Üye'
    ];
    return $rankId ? $ranks[$rankId] : $ranks;
}

function ticket_status($id = null){
    $status = [
        0 => 'Yanıtlanmadı',
        1 => 'Yanıtlandı',
        2 => 'Tamamlandı'
    ];
    return isset($id) ? $status[$id] : $status;
}