<?php

$query = $db->prepare('SELECT * FROM users');
$query->execute();
$user_count = $query->rowCount();

$query = $db->prepare('SELECT * FROM tickets');
$query->execute();
$ticket_count = $query->rowCount();

$query = $db->prepare('SELECT * FROM tickets WHERE ticket_status = 2');
$query->execute();
$closed_ticket_count = $query->rowCount();

$meta = [
    'title' => setting('title'),
    'description' => setting('description'),
    'keywords' => setting('keywords')
];

require view('index');
