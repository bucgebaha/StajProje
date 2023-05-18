<?php

$id = get('id');

$query = $db->prepare('DELETE FROM tickets WHERE ticket_owner_id = :id');
$query->execute([
    'id' => $id
]);
$query = $db->prepare('DELETE FROM users WHERE user_id = :id');
$query->execute([
    'id' => $id
]);

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;