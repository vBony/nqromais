<?php
session_start();
require "../../assets/classes/User.class.php";

$user_sts = new User($_SESSION['id']);

if(isset($_POST['cep']) && !empty($_POST['cep'])){
    $uf = $_POST['uf'];
    $localidade = $_POST['localidade'];
    $bairro = $_POST['bairro'];

    $user_sts->setEstado($uf);
    $user_sts->setCidade($localidade);
    $user_sts->setBairro($bairro);

    $user_sts->SaveOrCreateUser();

    $arr = array();
    $arr['uf'] = $uf;
    $arr['localidade'] = $localidade;
    $arr['bairro'] = $bairro;

    echo json_encode($arr);
}

if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = ucwords(strtolower($_POST['nome']));
    $user_sts->setNome($nome);

    $user_sts->SaveOrCreateUser();

    $arr = array();
    $arr['nome'] = $nome;

    echo json_encode($arr);
}

if(isset($_POST['telefone']) && !empty($_POST['telefone'])){
    $telefone = $_POST['telefone'];
    $user_sts->setTelefone($telefone);
    
    $user_sts->SaveOrCreateUser();

    $arr = array();
    $arr['telefone'] = $telefone;

    echo json_encode($arr);
}

if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = $_POST['email'];
    if($user_sts->mudaEmail($email) == true){
        $arr = array();
        $arr['email'] = $email;

        echo json_encode($arr);
    }else{
        $arr['email'] = "exist";
        echo json_encode($arr);
    }
}

if(isset($_FILES['foto']) && !empty($_FILES['foto'])){
    $tmpName = md5($_SESSION['id']).'.jpg';
    $tipo = $_FILES['foto']['type'];

    if($tipo == 'image/jpeg' || $tipo == 'image/png'){
        move_uploaded_file($_FILES['foto']['tmp_name'], '../../assets/imgs/user_pics/user_avatar/'.$tmpName);
        list($width_orig, $heigth_orig) = getimagesize('../../assets/imgs/user_pics/user_avatar/'.$tmpName);
        $ratio = $width_orig/$heigth_orig;
        $width = 320;
        $heigth = 320;

        if($width/$heigth > $ratio){
            $width = $heigth * $ratio;
        }else{
            $heigth = $width/$ratio;
        }

        $img = imagecreatetruecolor($width, $heigth);
        if($tipo == 'image/jpeg'){
            $origi = imagecreatefromjpeg('../../assets/imgs/user_pics/user_avatar/'.$tmpName);
        }elseif($tipo == 'image/png'){
            $origi = imagecreatefrompng('../../assets/imgs/user_pics/user_avatar/'.$tmpName);
        }

        imagecopyresampled($img, $origi, 0,0,0,0, $width, $heigth, $width_orig, $heigth_orig);
        imagejpeg($img, '../../assets/imgs/user_pics/user_avatar/'.$tmpName, 80);

        $user_sts->setAvatar($tmpName);
        $user_sts->SaveOrCreateUser();
        
        echo "done";
    }else{
        echo "no-img";
    }
}

if(isset($_POST['nova_senha']) && !empty($_POST['nova_senha'])){
    $id = $_SESSION['id'];
    $arr = array();
    $senha_nova = md5($_POST['nova_senha']);

    if($user_sts->senhaEmpty($_SESSION['id']) == true){
        $user_sts->setSenha($senha_nova);
        $user_sts->SaveOrCreateUser();

        $arr['senha_response'] = 'changed';
        echo json_encode($arr);
    }else{
        if(isset($_POST['senha_atual']) && !empty($_POST['senha_atual'])){
            $senha_atual = md5($_POST['senha_atual']);

            if($user_sts->verificaSenha($senha_atual, $id) == true){
                $user_sts->setSenha($senha_nova);
                $user_sts->SaveOrCreateUser();

                $arr['senha_response'] = 'changed';
                echo json_encode($arr);

            }elseif($user_sts->verificaSenha($senha_atual, $id) == false){
                $arr['senha_response'] = 'senha_atual_invalida';
                echo json_encode($arr);
            }

        }
    }
}

?>