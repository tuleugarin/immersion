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
        $email = $card_user['email'];
    }
}
?>
<main id="js-page-content" role="main" class="page-content mt-3">
     <?php // Показываем уведомление ошибки
            echo display_flash_message("danger");
        ?>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-lock'></i> Безопасность
        </h1>
    </div>
    <form action="security_page.php?id=<?php echo $id;?>" method="POST">
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-container">
                        <div class="panel-hdr">
                            <h2>Обновление эл. адреса и пароля</h2>
                        </div>
                        <div class="panel-content">
                            <!-- email -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Email</label>
                                <input type="text" id="simpleinput" class="form-control" value="<?php echo $email; ?>" name="email">
                            </div>

                            <!-- password -->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Пароль</label>
                                <input type="password" id="simpleinput" class="form-control">
                            </div>

                            <!-- password confirmation-->
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Подтверждение пароля</label>
                                <input type="password" id="simpleinput" class="form-control">
                            </div>


                            <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                <button class="btn btn-warning">Изменить</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</main>
<?php require "footer.php";?>