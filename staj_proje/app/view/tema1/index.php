<?php require view('static/header') ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading"><?= setting('welcome_title') ?></h1>
        <p class="lead text-muted"><?= setting('welcome_desc') ?></p>
        
    </div>
</section>
<div class="container">
    <div class="row pb-2">
        <div class="col-md-12">
            <h4 class="pb-3">Neler yapıyoruz?</h4>
        </div>
        <div class="col-md col-12 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kullanıcı Sayısı</h5>
                    <h1><?= $user_count ?></h1>
                    <p class="card-text">Aktif Kullanıcı</p>
                </div>
            </div>
        </div>
        <div class="col-md col-12 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Açılan Bilet Sayısı</h5>
                    <h1><?= $ticket_count ?></h1>
                    <p class="card-text">Destek için bizden istenen yardımlar.</p>
                </div>
            </div>
        </div><div class="col-md col-12 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tamamlanan bilet sayısı</h5>
                    <h1><?= $closed_ticket_count ?></h1>
                    <p class="card-text">Sorunlarını çözdüğümüz müşteri sayımız.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require view('static/footer') ?>