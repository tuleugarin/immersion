<?php
session_start();
require "functions.php";

$email = $_POST["email"];
$password = $_POST["password"];

/* Авторизация */

$user = get_user_by_email($email);

if(($user['email']==$email)){	//проверяем есть ли такой на базе

	if (password_verify($password, $user['password'])) {//если есть проверяем совпадают ли пароли

		//передаем email пользователя чтобы идентифицировать остальных страницах
		$_SESSION['is_logged_in'] = $user['email'];
		$_SESSION['id'] = $user['id'];

	    /*Переадресуем авторизированного пользователя на главную страницу*/
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