<?php

function get_user_by_email($email){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;","root", "");

	$sql = "SELECT * FROM list_users WHERE email=:email";

	$statement = $pdo->prepare($sql);
	$statement->execute(['email'=>$email]);
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
function add_user($email, $password){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;","root", "");

	$sql = "INSERT INTO list_users (email, password, img, username, title, tel, address, role) VALUES (:email, :password, '', '', '', '', '', '')";

	$statement = $pdo->prepare($sql);
	$result = $statement->execute([
		'email'=>$email,
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
function logout(){
	// Сброс сессии
	unset($_SESSION['is_logged_in']);
}
function is_admin($email){
	$user = get_user_by_email($email);
		if ($user['role'] == 'admin')
			return true;
		else
			return false;
}
/* Авторизация */
function authorization_check(){

	// Если идентификатор пуст, то он неавторизованный
	if (empty($_SESSION["is_logged_in"])){
		header("Location: /page_login.php");
				exit;
	}
}
/* Функция вывода данных из списка пользователей */
function get_users(){
		$pdo = new PDO("mysql:host=localhost;dbname=first_project;", "root", "");

		$sql = "SELECT * FROM list_users";

		$statment = $pdo -> prepare($sql);
        $statment -> execute();
        $card = $statment ->fetchAll(PDO::FETCH_ASSOC);
        return $card;
}
/* Функция загрузки аватара на сервер */
function upload_file($file){
	// Если не прекрепили файл
	if (empty($file['name'])){
		set_flash_message("danger", "Файл не выбран");
		redirect_to("create_user.php");
		return;
	}
	// Если размер файла большой
	if (($file['size'] > 1000000)){
		set_flash_message("danger", "Файл не должен быть больше 1Мб");
		redirect_to("create_user.php");
		return;
	}
	// Типы допустимых файлов
	$types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg', 'image/svg'];
	if (!in_array($file['type'], $types)){
		set_flash_message("danger", "Тип загружаемого файла не изображение");
		redirect_to("create_user.php");
		return;
	}
	// Копируем файл в директорию
	$uploaddir = 'img/demo/avatars/';
	$path = $file['name'];
	$ext = pathinfo($path,PATHINFO_EXTENSION); // тут получаем формат файла
	$file_name = uniqid().".".$ext;

	if (move_uploaded_file($file["tmp_name"], $uploaddir.$file_name)){
		return $file_name;
	}
	else{
		set_flash_message("danger", "Файл не загружен");
		redirect_to("create_user.php");
	}
}
/* Функции для создания дополнительных данных юзера */
function enter_username($id, $username){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;", "root", "");
	$sql = "UPDATE `list_users` SET `username` = :username WHERE `list_users`.`id` = $id";
	$statement = $pdo->prepare($sql);
	$statement->execute(['username'=>$username]);
}
function enter_title($id, $title){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;", "root", "");
	$sql = "UPDATE `list_users` SET `title` = :title WHERE `list_users`.`id` = $id";
	$statement = $pdo->prepare($sql);
	$statement->execute(['title'=>$title]);
}
function enter_tel($id, $tel){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;", "root", "");
	$sql = "UPDATE `list_users` SET `tel` = :tel WHERE `list_users`.`id` = $id";
	$statement = $pdo->prepare($sql);
	$statement->execute(['tel'=>$tel]);
}
function enter_address($id, $address){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;", "root", "");
	$sql = "UPDATE `list_users` SET `address` = :address WHERE `list_users`.`id` = $id";
	$statement = $pdo->prepare($sql);
	$statement->execute(['address'=>$address]);
}

/* Функция для создания дополнительных данных юзера */
function enter_user_img($id, $name_ava){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;", "root", "");
	$sql = "UPDATE `list_users` SET `img` = :img WHERE `list_users`.`id` = $id";
	$statement = $pdo->prepare($sql);
	$statement->execute(['img'=>$name_ava]);
}
/* Функция для проверки свои ли аккаунт редактирую */
function is_my_account_edit($id){
	if (is_admin($_SESSION['is_logged_in'])) {   // Проверка на админ
        $card=get_users();
        foreach ($card as $card_user){
            if ($card_user['id']==$id){
                $username = $card_user['username'];
                $title = $card_user['title'];
                $tel = $card_user['tel'];
                $address = $card_user['address'];
            }
        }
    }
    else{
        // Проверка свой id или нет
        if ($id==$_SESSION["id"]){
            $card=get_users();
            foreach ($card as $card_user){
                if ($card_user['id']==$id){
                    $username = $card_user['username'];
                    $title = $card_user['title'];
                    $tel = $card_user['tel'];
                    $address = $card_user['address'];
                }
            }
        }
        else{
            // Если не админ и не свой id
            set_flash_message("danger", "Ошибка : можно редактировать только свой профиль");
            redirect_to("users.php");
        }
    }
}

?>
