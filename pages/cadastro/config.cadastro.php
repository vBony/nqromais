<?php
require "../../assets/classes/User.class.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$usuario = new User;

$statusRequest['status'] = "none";

if(isset($nome) || !empty($nome) || strlen($nome) > 5){
    if(isset($email) || !empty($email) || strlen($email) > 1 || strstr($email, '@')){
        if(isset($senha) || !empty($senha) || strlen($senha) >= 8){
            $avatar = "default_user.png";
            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setAvatar($avatar);
            
            $senha_crip = md5($senha);
            $usuario->setSenha($senha_crip);

            //$usuario->SaveOrCreateUser();

            if($usuario->SaveOrCreateUser() == false){
                $statusRequest['status'] = "userEmailExist";
                echo json_encode($statusRequest);
            }else{
                $statusRequest['status'] = "done";
                echo json_encode($statusRequest);
            }
        }
    }
}else{
    echo json_encode("erro");
}

?>
