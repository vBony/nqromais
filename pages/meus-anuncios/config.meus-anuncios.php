<?php
    session_start();
    try{
        $pdo = new PDO("mysql:dbname=nqromais;host=localhost", "jackvini2", "Sacramento1@");
    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
    }
    
    if(isset($_SESSION['id']) || !empty($_SESSION['id'])){
        $userId = $_SESSION['id'];
        $sql = "SELECT anuncios.userid, anuncios.id, anuncios.titulo, anuncios.valor, anuncios.hr_dt_postagem, img_anuncio.url FROM anuncios INNER JOIN img_anuncio ON anuncios.id = img_anuncio.anuncio_id WHERE anuncios.userid = :userid GROUP BY img_anuncio.anuncio_id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":userid", $userId);
        $sql->execute();
    }
?>