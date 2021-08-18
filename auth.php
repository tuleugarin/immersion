<?php
session_start();
require "functions.php";

$login = $_POST["login"];
$password = $_POST["password"];

$user = get_user_by_login($login);

	if($user['login']==$login){								//проверяем есть ли такой на базе
		if (password_verify($password, $user['password'])) {//если есть проверяем совпадают ли пароли
	    set_flash_message("is_logged_in", $user['id']);//передаем номер пользователя чтобы
	    redirect_to("users.php");	    				//в дальнейшем определит админ он или нет
		}

		else {
		    set_flash_message("warning", "Не правильный пароль.");//тут я поменял стил и добавил их на страничке
			redirect_to("page_login.php");
		}
	}
	else{
	set_flash_message("danger", "Нет такого пользователя.");
	redirect_to("page_login.php");
	}

?>