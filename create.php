<?php
session_start();
require "functions.php";

$username = $_POST["username"];
$title = $_POST["title"];
$tel = $_POST["tel"];
$address = $_POST["address"];
$email = $_POST["email"];
$password = $_POST["password"];
$status = $_POST['status'];


$user = get_user_by_email($email);

//если логин занят то перенаправляем назад
if (!empty($user)) {
	set_flash_message("danger", "Этот эл. адрес уже занят другим пользователем.");
	redirect_to("create_user.php");
}

/* Загрузка аватарки */
if (isset($_FILES['file'])) {
	$name_ava = upload_file($_FILES['file']);
}

/* 	если пользователь новый тогда сохряняем в базе тут */
$id = add_user($email, $password);

//тут сохряняем в отдельной базе остальные данные
enter_username($id, $username);
enter_title($id, $title);
enter_tel($id, $tel);
enter_address($id, $address);
enter_status($id, $status);

//тут добавляем название картинки аватра в таблицу
enter_user_img($id, $name_ava);

set_flash_message("success", "Профиль успешно обновлен.");

redirect_to("users.php");
?>


