<?php

$id = get('id');

$query = $db->prepare('SELECT * FROM tickets 
                    INNER JOIN users ON tickets.ticket_owner_id = users.user_id 
                    WHERE tickets.ticket_id = :id');
$query->execute([
    'id' => $id
]);
$row = $query->fetch(PDO::FETCH_ASSOC);

$query2 = $db->prepare('SELECT * FROM messages 
                    INNER JOIN tickets ON tickets.ticket_id = messages.ticket_id 
                    INNER JOIN users ON messages.sender_id = users.user_id
                    WHERE tickets.ticket_id = :id');
$query2->execute([
    'id' => $id
]);
$messages = $query2->fetchAll(PDO::FETCH_ASSOC);
if (post('submit')) {
    $message = post('message');

    if (empty($message)) {
        $error = 'Mesaj boş olamaz!';
    } else {
        // mesajı veritabanına ekle
        $query = $db->prepare('INSERT INTO messages SET ticket_id = :ticket_id, sender_id = :sender_id, message_content = :content');
        $result = $query->execute([
            'ticket_id' => $id,
            'sender_id' => $_SESSION['admin_id'],
            'content' => post('message')
        ]);

        if ($result) {
            // bileti yanıtlandı olarak güncelle
            $query2 = $db->prepare('UPDATE tickets SET ticket_status = :ticket_status');
            $result2 = $query2->execute([
                'ticket_status' => '1'
            ]);

            if ($result2) header('Location:' . admin_url('show-ticket?id=' . $id));
            else {
                $error = 'Bir sorun oluştu ve kullanıcı eklenemedi!';
            }
        } else {
            $error = 'Bir sorun oluştu ve kullanıcı eklenemedi!';
        }
    }
}

require admin_view('show-ticket');
