<?php
require "config.anunciar.php";

if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
    header("Location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../assets/imgs/logoAPP.jpg" type="image/jpg" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <script src="../../assets/frameworks/jquery-3.4.1.min.js"></script>
    <script src="../../assets/frameworks/jquery.mask.min.js"></script>
    <script src="../../assets/frameworks/jquery.maskMoney.min.js"></script>
    <script src="anunciar.js"></script>
    <link rel="stylesheet" href="anunciar.css">
    <title>Inserir anúncio | nqro+</title>
</head>
<body>
    <div id="header">
        <div id="headerInv">
            <div id="headLogo"><p> nqro+ </p></div>
            <a href="../home/logout.php" id="userStatusArea">
                <div>
                    Olá, <?php echo $nome;?> <span>&times;</span>
                </div>
            </a>
        </div>
    </div>

    <div id="title"><h2>O que você não quer mais?</h2></div>

    <div id="formArea">
        <form method="post" enctype="multipart/form-data" id="form">
            
            <div class="inputKit">
                <div class="titleForInput titulo">Título</div>
                <input type="text" name="titulo" class="inputs" id="titulo">
                <div class="errorArea titulo"></div>
            </div>

            <div class="inputKit">
                <div class="titleForInput preco">Preço</div>
                <input type="text" name="preco" class="inputs" id="preco">
                <div class="errorArea preco"></div>
            </div>

            <div class="inputKit">
                <div class="titleForInput desc">Descrição</div>
                <textarea name="desc" id="desc" cols="86" rows="10" id="desc" class="inputs desc"></textarea>
                <div class="errorArea desc"></div>
            </div>

            <div class="inputKit">
                <div class="titleForInput categoria">Categoria</div>
                <select name="categoria" id="categoria" class="inputs">
                    <option value=""></option>
                    <option value="1">Imóveis</option>
                    <option value="2">Autos e peças</option>
                    <option value="3">Para a sua casa</option>
                    <option value="4">Eletrônicos e celulares</option>
                    <option value="5">Música e hobbies</option>
                    <option value="6">Esporte e lazer</option>
                    <option value="7">Artigos infantis</option>
                    <option value="8">Animais de estimação</option>
                    <option value="9">Moda e beleza</option>
                    <option value="10">Agro e indústria</option>
                    <option value="11">Comércio e escritório</option>
                    <option value="12">Serviços</option>
                </select>
                <div class="errorArea categoria"></div>
            </div>

            <div class="inputKit">
                <div class="titleForInput local">Localização</div>
                <input type="text" name="cep" class="inputs" id="cep" placeholder="CEP">
                <input type="text" name="estado" id="estado" class="inputs" readonly=“true”>
                <input type="text" name="cidade" id="cidade" class="inputs" readonly=“true”>
                <input type="text" name="bairro" id="bairro" class="inputs" readonly=“true”>
                <div class="errorArea cep"></div>
            </div>

            <div class="inputKit">
                <div class="titleForInput fotos">Fotos</div>
                <div id="subTfotos">Adicione até <strong>6 fotos</strong> <strong>(.png ou .jpg)</strong></div>
                <input type="file" name="fotos[]" id="fotos" multiple="multiple" accept="image/.jpeg,.png,.jpg">
                <div class="errorArea fotos"></div>
            </div>

            <div class="inputKit">
                <div class="titleForInput contato">Contato</div>
                <?php if($telefone == null){ ?>
                    <div id="numTelefone">Nenhum número cadastrado, para cadastrar <a href="../meus-dados/meus-dados.php" target="_blank">clique aqui!</a></div>
                <?php }else{ ?>
                    <div id="numTelefone"><?php echo $telefone; ?></div>
                <?php } ?>
            </div>
    </div>

        <div id="footer">
            <div id="footerInv">
                <div id="footerTerms"> Ao publicar você concorda e aceita nossos <a href=""> Termos de Uso </a> e <a href=""> Privacidade </a></div>
                <input type="submit" value="Enviar Anúncio" id="btnSubmit">
            </div>
        </div>

        </form>

        <pre id="message"></pre>
</body>
</html>