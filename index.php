<?php

//require "functions.php";

 session_start();
    require "functions.php";
    authorization_check();  // Проверка авторизации
     if (is_admin($_SESSION['is_logged_in']))    // Проверка на админ
        $card=get_users();
        foreach ($card as $card_user){
            if ($card_user['id']==80){
                $username = $card_user['username'];
                $title = $card_user['title'];
                $tel = $card_user['tel'];
                $address = $card_user['address'];
            }
        }
echo $tel;
?>