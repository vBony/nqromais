<?php require "config.anuncio.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temp</title>
</head>
<body>
    <form method="post">
        <h1>Pesquisar ID do anuncio</h1>
        <input type="search" name="pesquisar" id="pesquisar">
        <input type="submit" value="Pesquisar">
    </form><br><br>
    <?php if(isset($_POST['pesquisar']) || !empty($_POST['pesquisar'])) {?>
        <div><strong>Anunciante: </strong><?php echo $user['nome']; ?></div><br>
        <div><strong>Título do anúncio: </strong><?php echo $anuncio['titulo']; ?></div>
        <div><strong>Preço: </strong><?php echo $anuncio['valor']; ?></div>
        <div><strong>Cidade: </strong><?php echo $anuncio['cidade']; ?> <strong>Estado: </strong><?php echo $anuncio['estado']; ?></div>
        <div><strong>Descriçao: </strong><br><?php echo nl2br($anuncio['descricao']); ?></div><br>
        <div><strong>Categoria: </strong><?php echo utf8_encode($categoria['nome']); ?></div>
        <div><strong>Data de postagem: </strong><?php echo $data; ?></div>
        <div><strong>hora de postagem: </strong><?php echo $hora; ?></div>
        <div><strong>Fotos:</strong><br>
            <?php foreach($sql4 as $fotos){?>
                <img src="../../assets/imgs/anuncios/<?php echo $fotos['url']; ?>" alt="" height="150px" style="border:solid 1px black;">
            <?php } ?>
        </div>


    <?php }else{
        echo "";
    } ?>

</body>
</html>