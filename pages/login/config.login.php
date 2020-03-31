<?php
require "../../assets/classes/User.class.php";
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$statusRequest['status'] = "none";

if(isset($senha) && !empty($senha) && strstr($email, '@') && strstr($email, '.') && isset($email) && !empty($email)){
    $cript_senha = md5($senha);
    $user = new User();

    if($user->defaultLogin($email, $cript_senha) == true){
        $statusRequest['status'] = "done";
        echo json_encode($statusRequest);
    }else{
        $statusRequest['status'] = "fail";
        echo json_encode($statusRequest);
    }
}
?>