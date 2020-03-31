<?php
session_start();
require "assets/classes/User.class.php";

if(isset($_SESSION['id']) && !empty($_SESSION['id']) || isset($_SESSION['fb_id']) && !empty($_SESSION['fb_id'])){
    $user = new User($_SESSION['id']);

    $id = $user->getId();
    $fbId = $user->getFbId();
    $nome = $user->getNome();
    $email = $user->getEmail();
    $telefone = $user->getTelefone();
    $avatar = $user->getAvatar();
}

?>