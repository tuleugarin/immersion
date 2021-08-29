<?php
session_start();
require "functions.php";

$email = $_POST["email"];

$user = get_user_by_email($email);

//если логин занят то перенаправляем назад
if (!empty($user)) {
	set_flash_message("danger", "Этот эл. адрес уже занят другим пользователем.");
	redirect_to("security.php");
}

$id = $_GET['id'];

//тут обновляем email
enter_email($id, $email);

set_flash_message("success", "Профиль успешно обновлен.");

redirect_to("users.php");
?>


