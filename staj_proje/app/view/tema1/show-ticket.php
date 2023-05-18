<?php require view('static/header') ?>

<div class="clear" style="height: 10px;"></div>
<div class="container">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-6">
                    <?php if ($err = error()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $err ?>
                        </div>
                    <?php endif; ?>
                    <div class="card card-bordered">
                        <div class="card-header">
                            <h3 class="card-title"><strong><?= $row['ticket_title'] ?></strong></h3>
                        </div>


                        <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">
                            <div class="media media-chat">
                                <div class="media-body">
                                </div>
                            </div>

                            <div class="media media-chat media-chat-reverse">
                                <div class="media-body">
                                    <p><?= $row['ticket_desc'] ?></p>
                                    <p class="meta" style="color:grey"><?= $row['ticket_date'] ?></p>
                                </div>
                            </div>

                            <?php foreach ($messages as $message) : ?>
                                <div class="media media-chat <?= $message['user_rank'] > 1 ? 'media-chat-reverse' : null; ?>">
                                    <div class="media-body">
                                        <p><?= $message['message_content'] ?></p>
                                        <p class="meta" style="color:grey"><?= $message['message_date'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                            </div>
                        </div>

                        <div class="publisher bt-1 border-light">
                            <form action="" method="post">
                                <?php if ($row['ticket_status'] < 2) : ?>
                                    <div class="form-content">
                                        <textarea class="publisher-input" name="message" rows="4" cols="50" placeholder="Mesajınızı girin..."></textarea>
                                    </div>
                                    <div style="padding-top:10px;" class="menu-btn">
                                        <button class="publisher-btn text-info float-right" type="submit" value="1" name="submit">Gönder</button>
                                    </div>
                                <?php else : ?>
                                    <p class="m-b-0">Tamamlandı.</p>
                                <?php endif; ?>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var objDiv = document.getElementById("chat-content");
    objDiv.scrollTop = objDiv.scrollHeight;
</script>

<?php require view('static/footer') ?>