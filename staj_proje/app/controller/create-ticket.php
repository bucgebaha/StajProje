<?php

$meta = [
    'title' => "Bilet Oluştur"
];


if(!empty(get('error'))) $error = get('error');

if (post('submit')) {
    #formdan aldığın bilgileri değişkenlere ata
    $title = post('title');
    $desc = post('desc');
    $user_id = $_SESSION['user_id'];

    #form alanlarını kontrol et
    if (!$title)
        $error = "Lütfen başlık yazın!";
    elseif (!$desc)
        $error = "Lütfen açıklama girin!";
    else{
        $query = $db->prepare('INSERT INTO tickets SET ticket_title = :title, ticket_desc = :desc, ticket_owner_id = :id');
        $result = $query->execute([
            'title' => $title,
            'desc' => $desc,
            'id' => $user_id
        ]);
    
        if($result){
            $success = 'Başarıyla oluşturuldu!';
            header('Refresh:2;url=' . site_url('tickets'));
        }else{
            $error = 'Beklenmeyen bir sorun oluştu, lütfen daha sonra tekrar deneyin.';
        }
    }
}

require view('create-ticket');