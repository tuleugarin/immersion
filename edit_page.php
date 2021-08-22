<?php
    session_start();
    require "functions.php";
    authorization_check();  // Проверка авторизации
    $admin = get_admin();
    if (!empty($admin)){     // Проверка на админ
        $card=info_card();
        foreach ($card as $card_user){
            if ($card_user['id']==$_GET['id']){
                $username = $card_user['username'];
                $title = $card_user['title'];
                $tel = $card_user['tel'];
                $address = $card_user['address'];
            }
        }
    }
    else{
        // Проверка свой id или нет
        if ($_GET['id']==$_SESSION["is_logged_in_id"]){
            $card=info_card();
            foreach ($card as $card_user){
                if ($card_user['id']==$edit_id){
                    $username = $card_user['username'];
                    $title = $card_user['title'];
                    $tel = $card_user['tel'];
                    $address = $card_user['address'];
                }
            }
        }
        else{
            // Если не админ и не свой id
            set_flash_message("danger", "Ошибка : можно редактировать только свой профиль");
            redirect_to("users.php");
        }
    }
    require "header.php";
?>
    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-plus-circle'></i> Редактировать
            </h1>

        </div>
        <form action="edit.php" method="POST">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Общая информация</h2>
                            </div>
                            <div class="panel-content">
                                <!-- username -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Имя</label>
                                    <input type="text" id="simpleinput" class="form-control" value="<?php echo $username;?>" name="username">
                                </div>

                                <!-- title -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Место работы</label>
                                    <input type="text" id="simpleinput" class="form-control" value="<?php echo $title;?>" name="title">
                                </div>

                                <!-- tel -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Номер телефона</label>
                                    <input type="text" id="simpleinput" class="form-control" value="<?php echo $tel;?>" name="tel">
                                </div>

                                <!-- address -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Адрес</label>
                                    <input type="text" id="simpleinput" class="form-control" value="<?php echo $address;?>" name="address">
                                </div>
                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button class="btn btn-warning">Редактировать</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
<?php require "footer.php";?>