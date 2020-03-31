<?php
session_start();
require "../../assets/classes/User.class.php";

if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

    $userData = new User($_SESSION['id']);
    $nome = $userData->getNome();  
    $email = $userData->getEmail();
    $telefone = $userData->getTelefone();
    $fb_id = $userData->getFbId();  
    $avatar = $userData->getAvatar();
    $estado = $userData->getEstado();
    $cidade = $userData->getCidade();
    $bairro = $userData->getBairro();
    $verifica_senha = $userData->senhaEmpty($_SESSION['id']);
}else{
    header("Location: ../../index.php");
}
?>