<?php

$id = get('id');

$query = $db->prepare('UPDATE tickets SET ticket_status = :ticket_status');
$result = $query->execute([
    'ticket_status' => '2'
]);

if ($result) header('Location:' . admin_url('tickets'));
else {
    $error = 'Bir sorun oluştu ve kullanıcı eklenemedi!';
}
