<?php
session_start();
require "functions.php";

$login = $_POST["login"];
$password = $_POST["password"];
$rememberme = $_POST["rememberme"];

/* Авторизация */

$user = get_user_by_login($login);

	if(($user['login']==$login)){	//проверяем есть ли такой на базе

		if (password_verify($password, $user['password'])) {//если есть проверяем совпадают ли пароли

		    //Запоминаем имя в сессии
			$_SESSION['login'] = $login;

			//передаем номер пользователя чтобы
			$_SESSION['is_logged_in'] = $user['id'];

			//и в cookies, если пользователь пожелал запомнит его
			if ($rememberme== 'on')
				setcookie('login', $login, time() + 3600 * 24 * 7);

		    /*Переадресуем авторизированного пользователя на одну из страниц*/
		    redirect_to("users.php");
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