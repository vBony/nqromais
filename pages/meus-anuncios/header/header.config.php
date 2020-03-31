<?php
require "../../assets/classes/User.class.php";


if(isset($_SESSION['id']) && !empty($_SESSION['id']) || isset($_SESSION['fb_id']) && !empty($_SESSION['fb_id'])){
    $header_user = new User($_SESSION['id']);

    $header_id = $header_user->getId();
    $header_fbId = $header_user->getFbId();
    $header_nome = $header_user->getNome();
    $header_email = $header_user->getEmail();
    $header_telefone = $header_user->getTelefone();
    $header_avatar = $header_user->getAvatar();
}

?>