<?php
session_start();
require "../../assets/classes/Anuncios.class.php";
$anuncio = new Anuncio();
    if(!empty($_POST['titulo'])){   //FAZER AMANHA: Proibir mais de 6 imagens
        if(count($_FILES['fotos']['tmp_name']) < 7 && !empty($_FILES['fotos']['tmp_name']['0'])){
            $userid = $_SESSION['id'];
            $titulo = $_POST['titulo'];
            $preco = $_POST['preco'];
            $desc = $_POST['desc'];
            $categoria = $_POST['categoria'];
            $estado = $_POST['estado'];
            $cidade = $_POST['cidade'];
            $bairro = $_POST['bairro'];
            $fotos = $_FILES['fotos'];
            $status['msg'] = " ";

            $anuncio->setUserId($userid);
            $anuncio->setTitulo($titulo);
            $anuncio->setPreco($preco);
            $anuncio->setDesc($desc);
            $anuncio->setCategoriaID($categoria);
            $anuncio->setEstado($estado);
            $anuncio->setCidade($cidade);
            $anuncio->setBairro($bairro);
            $anuncio->setFotos($fotos);
            

            $anuncio->Save_anuncio();
            echo "done";
        }

        if(empty($_FILES['fotos']['tmp_name']['0'])){
            echo "no-photos";
        }
    
        if(count($_FILES['fotos']['tmp_name']) > 7){
            echo "max-photos";
        }
        
    }

    
?>