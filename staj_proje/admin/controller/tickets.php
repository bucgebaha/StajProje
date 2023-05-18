<?php

$query = $db->prepare('SELECT * FROM tickets ORDER BY ticket_status ASC');
$query->execute();
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

require admin_view('tickets');