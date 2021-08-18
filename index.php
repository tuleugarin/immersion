<?php
session_start();
require "functions.php";
var_dump($_SESSION["is_logged_in"]);


function get_admin(){
	$pdo = new PDO("mysql:host=localhost;dbname=first_project;", "root", "");

	$sql = "SELECT * FROM list_status WHERE id_user";

	$statement = $pdo->prepare($sql);
	$statement->execute(['id_user'=>$users]);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);

	foreach ($users as $key => $value)
		if ($value['id_user']==$_SESSION["is_logged_in"]) {
			return 1;
		}
}

$admin =get_admin();

function set_button_create($name){
		if (!empty($name)) {
			echo "<a class=\"btn btn-success\" href=\"create_user.html\">Добавить</a>";
		}
}

set_button_create($admin);

?>