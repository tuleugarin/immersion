<?php
    session_start();
    require "functions.php";
    authorization_check();  // Проверка авторизации
    $id = $_GET['id'];
    is_my_account_edit($id);
    require "header.php";
    $card=get_users();
    foreach ($card as $card_user){
        if ($card_user['id']==$id){
            $img = $card_user['img']; }    }
?>
    <main id="js-page-content" role="main" class="page-content mt-3">
         <?php // Показываем уведомление ошибки
            echo display_flash_message("danger");
            echo display_flash_message("success");
        ?>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-image'></i> Загрузить аватар
            </h1>
        </div>
        <form action="media_page.php?id=<?php echo $id;?>" enctype="multipart/form-data" method="POST">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Текущий аватар</h2>
                            </div>
                            <div class="panel-content">
                                <div class="form-group">
                                    <img src="img/demo/avatars/<?php has_img($img);?>" alt="" class="img-responsive" width="200">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="example-fileinput">Выберите аватар</label>
                                    <input type="file" id="example-fileinput" class="form-control-file" name="file">
                                </div>
                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button class="btn btn-warning">Загрузить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
<?php require "footer.php";?>