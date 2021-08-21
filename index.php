<?php

require "functions.php";

session_start();
$id = "avatar-";
$filename = uniqid($id).".png";

/* Префикс к уникальному id можно добавить одним
 * из следующих способов:
 *
 * $uniqid = $prefix . uniqid();
 * $uniqid = uniqid($prefix);
 */
printf($filename);



$handle = opendir('../immersion/img/demo/avatars');
	if ($handle != false){
		echo 'Файлы : <br>';
		while (($file = readdir ($handle)) !== false)
			echo $file.'<br>';
	}
	closedir($handle);


?>