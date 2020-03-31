<?php
session_start();
require "../../assets/classes/User.class.php";

if(isset($_SESSION['id']) || !empty($_SESSION['id']) || isset($_SESSION['fb_id']) || !empty($_SESSION['fb_id'])){
    $userBD = new User($_SESSION['id']);
    $nome = $userBD->getNome();
    $email = $userBD->getEmail();
    $avatar = "../../assets/imgs/user_pics/user_avatar/".$userBD->getAvatar();
    $userID = $_SESSION['id'];
    $userFBID = $_SESSION['fb_id'];
}


?>