<?php

$meta = [
    'title' => "Biletler"
];

if (!isset($_SESSION['user_id'])) {
    $error = 'Biletlerinizi görmek için lütfen giriş yapın.';
    header("Location: " . site_url('login') . '?error=' . $error);
}

$query = $db->prepare('SELECT * FROM tickets WHERE ticket_owner_id = :user_id ORDER BY ticket_status ASC');
$query->execute([
    'user_id' => $_SESSION['user_id']
]);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

$query2 = $db->prepare('SELECT * FROM tickets WHERE ticket_status = 1 AND ticket_owner_id = :user_id');
$query2->execute([
    'user_id' => $_SESSION['user_id']
]);
$count = $query2->rowCount();

require view('tickets');
