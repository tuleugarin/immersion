<?php
session_start();
require "functions.php";

$status = $_POST["status"];

$id = $_GET['id'];

//тут обновляем status
enter_status($id, $status);

set_flash_message("success", "Профиль успешно обновлен.");

redirect_to("users.php");
?>


