<?php
session_start();
require "functions.php";

$id = $_GET['id'];

//* Загрузка аватарки */
if (isset($_FILES['file'])) {
	$name_ava = upload_file($_FILES['file']);
}
//тут добавляем название картинки аватра в таблицу

enter_user_img($id, $name_ava);

set_flash_message("success", "Профиль успешно обновлен.");

redirect_to("media.php?id=$id");
?>


