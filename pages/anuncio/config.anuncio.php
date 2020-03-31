<?php
try{
    $pdo = new PDO("mysql:dbname=nqromais;host=localhost", "jackvini2", "Sacramento1@");
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}

if(!empty($_POST['pesquisar'])){
    $pesquisa = $_POST['pesquisar'];
    $anuncio = array();
    $sql = "SELECT * FROM anuncios WHERE id = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":id", $pesquisa);
    $sql->execute();

    if($sql->rowCount() > 0){
        foreach($sql as $anuncio);

        $objDate = DateTime::createFromFormat('Y-m-d H:i:s', $anuncio['hr_dt_postagem']);
        $data = $objDate->format('d  m  Y');
        $hora = $objDate->format('H:i');
    }else{
        echo "<script>alert('Anuncio não encontrado!');</script>";
    }

    $sql2 = "SELECT * FROM categoria WHERE id = :id";
    $sql2 = $pdo->prepare($sql2);
    $sql2->bindValue(":id", $anuncio['categoria_id']);
    $sql2->execute();
    foreach($sql2 as $categoria);

    $sql3 = "SELECT * FROM users WHERE id = :id";
    $sql3 = $pdo->prepare($sql3);
    $sql3->bindValue(":id", $anuncio['userid']);
    $sql3->execute();
    foreach($sql3 as $user);

    $sql4 = "SELECT * FROM img_anuncio WHERE anuncio_id = :id";
    $sql4 = $pdo->prepare($sql4);
    $sql4->bindValue(":id", $anuncio['id']);
    $sql4->execute();

}
?>