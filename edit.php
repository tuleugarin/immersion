<?php
session_start();
require "functions.php";

$username = $_POST["username"];
$title = $_POST["title"];
$tel = $_POST["tel"];
$address = $_POST["address"];

$id_user = $_GET['id'];

////тут сохряняем в отдельной базе остальные данные
upd_info_card($id_user, $name_ava, $username, $title, $tel, $address);

set_flash_message("success", "Профиль успешно обновлен.");

redirect_to("users.php");
?>


