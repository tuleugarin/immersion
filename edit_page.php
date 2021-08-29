<?php
session_start();
require "functions.php";

$username = $_POST["username"];
$title = $_POST["title"];
$tel = $_POST["tel"];
$address = $_POST["address"];

$id = $_GET['id'];


//тут сохряняем в отдельной базе остальные данные
enter_username($id, $username);
enter_title($id, $title);
enter_tel($id, $tel);
enter_address($id, $address);


set_flash_message("success", "Профиль успешно обновлен.");

redirect_to("users.php");
?>


