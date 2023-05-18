<?php

$query = $db->prepare('SELECT * FROM users ORDER BY user_id DESC');
$query->execute();
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

require admin_view('users');