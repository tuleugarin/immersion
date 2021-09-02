<?php
    session_start();
    require "functions.php";
    authorization_check();  // Проверка авторизации
    $id = $_GET['id'];
    is_my_account_edit($id);

delete_user($id);

if (is_admin($_SESSION['is_logged_in'])) {
    set_flash_message("success", "Профиль успешно удален.");

    redirect_to("users.php");
}

else
    redirect_to("page_register.php");


?>
