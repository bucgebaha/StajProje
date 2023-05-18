<?php require admin_view('static/header'); ?>

<div class="box- menu-container">
    <h2>Menü Düzenle (#<?= $id ?>)</h2>
    <form action="" method="post">
        <div style="padding-bottom: 10px; max-width: 400px">
            <input value="<?= post('menu_title') ? post('menu_title') : $row['menu_title'] ?>" type="text" name="menu_title" placeholder="Menü Başlığı">
        </div>
        <ul id="menu">
            <?php foreach ($menuData as $key => $menu) : ?>
                <li>
                    <div class="menu-item">
                        <a href="#" class="delete-menu">
                            <i class="fa fa-times"></i>
                        </a>
                        <input value="<?= $menu['title'] ?>" type="text" name="title[]" placeholder="Menü Adı">
                        <input value="<?= $menu['url'] ?>" type="text" name="url[]" placeholder="Menü Linki">
                    </div>
                    <div class="sub-menu">
                        <ul>
                            <?php if (isset($menu['submenu'])) :
                                foreach ($menu['submenu'] as $k => $submenu) : ?>
                                    <li>
                                        <div class="menu-item">
                                            <a href="#" class="delete-menu">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <input type="text" name="sub_title_<?=$key?>[]" value="<?= $submenu['title'] ?>" placeholder="Menü Adı">
                                            <input type="text" name="sub_url_<?=$key?>[]" value="<?= $submenu['url'] ?>" placeholder="Menü Linki">
                                        </div>
                                    </li>
                            <?php endforeach;
                            endif; ?>
                        </ul>
                    </div>
                    <a href="#" class="btn add-submenu">Alt Menü Ekle</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="menu-btn">
            <a href="#" class="btn" id="add-menu">Menü Ekle</a>
            <button type="submit" value="1" name="submit">Kaydet</button>
        </div>
    </form>
</div>

<script>
    $(function() {
        $('#add-menu').on('click', function(e) {
            $('#menu').append('<li>\n' +
                '<div class="menu-item">\n' +
                ' <a href="#" class="delete-menu">\n' +
                '    <i class="fa fa-times"></i>\n' +
                ' </a>\n' +
                ' <input type="text" name="title[]" placeholder="Menü Adı">\n' +
                '   <input type="text" name="url[]" placeholder="Menü Linki">\n' +
                '  </div>\n' +
                ' <div class="sub-menu">\n' +
                '    <ul></ul></div>\n' +
                ' <a href="#" class="add-submenu btn">Alt Menü Ekle</a>\n' +
                ' </li>');
            e.preventDefault();
        });

        $(document.body).on('click', '.add-submenu', function(e) {
            var index = $(this).closest('li').index();
            $(this).prev('.sub-menu').find('ul').append(
                ' <li>\n ' +
                '   <div class="menu-item">\n' +
                '       <a href="#" class="delete-menu">\n' +
                '             <i class="fa fa-times"></i>\n' +
                '            </a>\n' +
                '             <input type="text" name="sub_title_' + index + '[]" placeholder="Menü Adı">\n' +
                '              <input type="text" name="sub_url_' + index + '[]" placeholder="Menü Linki">\n' +
                '           </div>\n' +
                '       </li>'
            );
            e.preventDefault();
        })

        $(document.body).on('click', '.delete-menu', function(e) {
            if ($('#menu li').length === 1)
                alert('En az bir menü olmak zorundadır.');
            else
                $(this).closest('li').remove();
            e.preventDefault();
        })
    });
</script>

<?php require admin_view('static/footer'); ?>