<?php

function get_user_by_login($login){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;","root", "");

	$sql = "SELECT * FROM list_users WHERE login=:login";

	$statement = $pdo->prepare($sql);
	$statement->execute(['login'=>$login]);
	$user = $statement-> fetch(PDO::FETCH_ASSOC);
	return $user;
}
function set_flash_message($name, $message){

	$_SESSION[$name] = $message;
}
function redirect_to($path){
	header("Location: {$path}");
	exit;
}
function add_user($login, $password){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;","root", "");

	$sql = "INSERT INTO list_users (login, password) VALUES (:login, :password)";

	$statement = $pdo->prepare($sql);
	$result = $statement->execute([
		'login'=>$login,
		'password'=>password_hash($password, PASSWORD_DEFAULT)
	]);

	return $pdo->lastInsertId();
}
function display_flash_message($name){
	if (isset($_SESSION[$name])){
		echo "<div class=\"alert alert-{$name} text-dark\" role=\"alert\">{$_SESSION[$name]}</div>";
               unset($_SESSION[$name]);
    }
}
/*Эта функция чистит сессии при нажатии на кнопку ВЫХОД*/
function Logout(){

	// Делаем cookies устаревшими (единственный способ их удалит)
	setcookie('login', '', time() -1 );// -1 сек пожже

	// Сброс сессии
	unset($_SESSION['is_logged_in']);
	unset($_SESSION['login']);
}
/* Если в контексте сессии не установлен, то мы будем брать их из куки*/
function authorization_check(){

	if ( !isset($_SESSION['login']) && isset($_COOKIE['login'])){
		$_SESSION["login"] = $_COOKIE["login"];
	}

	// Неавторизованных пользователей отправляем страницу регистра
	if (empty($_SESSION["is_logged_in"])){
		header("Location: /page_login.php");
				exit;
	}
}
/*создал таблицу list_status там 2 строки id и id_user-его
я связал с id строкой таблицы зарегистрированных пользователей
чтобы  выбрат среди них админов */
function get_admin(){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;", "root", "");

	$sql = "SELECT * FROM list_status WHERE id_user";

	$statement = $pdo->prepare($sql);
	$statement->execute(['id_user'=>$users]);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);

	foreach ($users as $key => $value)
		if ($value['id_user']==$_SESSION["is_logged_in"])
			return true;//тут я сравнил айди номер из сессии с айди номерами из таблицы с админами если 1 тогда он админ

}
/*Эта функция определяет если переменная не пустая
тогда он АДМИН и ему надо показать кнопку иначе не показыват */
function display_button_create($name)	{
		if (!empty($name)) {
			echo "<a class=\"btn btn-success\" href=\"create_user.php\">Добавить</a>";
		}
}
/* функция опции настройки только для юзера*/
function display_settings(){
			echo  " <i class=\"fal fas fa-cog fa-fw d-inline-block ml-1 fs-md\"></i>
                   <i class=\"fal fa-angle-down d-inline-block ml-1 fs-md\"></i></a>
		   <div class=\"dropdown-menu\">
			        <a class=\"dropdown-item\" href=\"edit.html\">
			            <i class=\"fa fa-edit\"></i>
			        Редактировать</a>
			        <a class=\"dropdown-item\" href=\"security.html\">
			            <i class=\"fa fa-lock\"></i>
			        Безопасность</a>
			        <a class=\"dropdown-item\" href=\"status.html\">
			            <i class=\"fa fa-sun\"></i>
			        Установить статус</a>
			        <a class=\"dropdown-item\" href=\"media.html\">
			            <i class=\"fa fa-camera\"></i>
			            Загрузить аватар
			        </a>
			        <a href=\"#\" class=\"dropdown-item\" onclick=\"return confirm('are you sure?')\">
			            <i class=\"fa fa-window-close\"></i>
			            Удалить
			        </a>
			    </div>";
}
/* Функция вывода данных из списка пользователей */
function info_card(){
		$pdo = new PDO("mysql:host=localhost;dbname=first_project;", "root", "");

		$sql = "SELECT * FROM list_card";

		$statment = $pdo -> prepare($sql);
        $statment -> execute();
        $card = $statment ->fetchAll(PDO::FETCH_ASSOC);
        return $card;
}
function set_info_card($id_new_user, $login, $upload_img, $username, $title, $tel, $address){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;", "root", "");
	$sql = "INSERT INTO list_card (id, email, img, username, title, tel, address) VALUES (:id, :email,:img, :username, :title, :tel, :address)";
	$statement = $pdo->prepare($sql);
	$result = $statement->execute([
		'id'=>$id_new_user,
		'email'=>$login,
		'img'=>$upload_img,
		'username'=>$username,
		'title'=>$title,
		'tel'=>$tel,
		'address'=>$address,
	]);

	return $pdo->lastInsertId();
}
function upload_file($file){
		$uploads_dir = 'img/demo/avatars';
        $tmp_name = $file["tmp_name"];
        $name_ava = "avatar-".uniqid().".png";

	if (empty($file['name'])){
		set_flash_message("danger", "Файл не выбран");
		redirect_to("create_user.php");
		return;
	}

	if (move_uploaded_file($tmp_name, "$uploads_dir/$name_ava")){
		set_flash_message("success", "Файл загружен");

	}
	else{
		set_flash_message("danger", "Файл не загружен1");
		redirect_to("create_user.php");
	}

}

?>
