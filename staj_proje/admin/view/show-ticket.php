<?php require admin_view('static/header'); ?>

<div style="padding-left:30%" class="container">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                </div>
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="chat-about">
                                    <h1 class="m-b-0"><?= $row['ticket_title'] ?></h1>
                                    <p>Kullanıcı: <?= $row['user_name'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width:40%;padding-top:10px;" class="chat-history">
                        <ul class="m-b-0" style="padding:5px;">
                            <li class="clearfix">
                                <div class="message other-message float-right"> <?= $row['ticket_desc'] ?> </div>
                                <div style="padding:5px;" class="message-data text-right">
                                    <span class="message-data-time"><?= $row['ticket_date'] ?></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php foreach ($messages as $message) : ?>
                        <div style="width:40%;padding-top:10px;<?php if ($message['user_rank'] < 3) : ?>padding-left:30%; <?php endif; ?>" class="chat-history">
                            <ul class="m-b-0" style="padding:5px;">
                                <li class="clearfix">
                                    <div class="message other-message float-right"> <?= $message['message_content'] ?> </div>
                                    <div style="padding:5px;" class="message-data text-right">
                                        <span class="message-data-time"><?= $message['message_date'] ?></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                    <?php if($row['ticket_status'] < 2): ?>
                    <div style="width:70%;padding-top:10px;" class="chat-message clearfix">
                        <div class="input-group mb-0">
                            <div class="input-group-prepend">
                                <form action="" method="post">
                                    <div class="form-content">
                                        <textarea name="message" rows="4" cols="30" placeholder="Mesajınızı girin..."></textarea>
                                    </div>
                                    <div style="padding-top:10px;" class="menu-btn">
                                        <button type="submit" value="1" name="submit">Gönder</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                        <h1 class="m-b-0">Tamamlandı.</h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require admin_view('static/footer'); ?>