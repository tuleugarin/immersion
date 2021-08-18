<?php
session_start();
require "functions.php";

$login = $_POST["login"];
$password = $_POST["password"];

$user = get_user_by_login($login);

//если логин занят то перенаправляем назад
if (!empty($user)) {
	set_flash_message("danger", "Этот эл. адрес уже занят другим пользователем.");
	redirect_to("page_register.php");
}

//если пользователь новый тогда сохряняем в базе
add_user($login, $password);

set_flash_message("success", "Регистрация успешна");

redirect_to("page_login.php")


?>