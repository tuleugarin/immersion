<?php
session_start();
require "functions.php";

$username = $_POST["username"];
$title = $_POST["title"];
$tel = $_POST["tel"];
$address = $_POST["address"];
$login = $_POST["login"];
$password = $_POST["password"];
$status_online = $_POST['status_online'];



$user = get_user_by_login($login);


//если логин занят то перенаправляем назад
if (!empty($user)) {
	set_flash_message("danger", "Этот эл. адрес уже занят другим пользователем.");
	redirect_to("create_user.php");
}

/* 	если пользователь новый тогда сохряняем в базе тут
*	создаем логин и пароль и получаем id номер
*/
$id_new_user = add_user($login, $password);

/* Загрузка аватарки */
if (isset($_FILES['file'])) {
		$uploads_dir = 'img/demo/avatars';
        $tmp_name = $file["tmp_name"];
        $name_ava = "avatar-".uniqid().".png";

	upload_file($_FILES['file'], $uploads_dir, $name_ava);
}
else{
	set_flash_message("danger", "файл не загружен2");
	redirect_to("create_user.php");
}
//var_dump($name_ava);die;
//тут сохряняем в отдельной базе остальные данные
set_info_card($id_new_user, $login, $name_ava, $username, $title, $tel, $address);

set_flash_message("success", "Профиль успешно обновлен.");

redirect_to("users.php");
?>


