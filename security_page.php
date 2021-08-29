<?php
session_start();
require "functions.php";

$email = $_POST["email"];

$id = $_GET['id'];


//тут обновляем email
enter_email($id, $email);

set_flash_message("success", "Профиль успешно обновлен.");

redirect_to("users.php");
?>


