<?php 
require "config.meus-anuncios.php";
require "header/header.config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>nqro+ - O melhor site de compras e vendas do Brasil</title>
    <link rel="stylesheet" href="meus-anuncios.css">
    <link rel="stylesheet" href="header.css">
    <link rel="shortcut icon" href="../../assets/imgs/logoAPP.jpg" type="image/jpg" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <script src="../../assets/frameworks/jquery-3.4.1.min.js"></script>
    <script src="meus-anuncios.js"></script>
</head>
<body>

<div id="headerBackground">
    <div id="headerInv">
        <div id="headerLogo">NQRO+</div>
        <div id="headerMenuArea">

        <?php if(isset($_SESSION['id']) && !empty($_SESSION['id']) || isset($_SESSION['fb_id']) && !empty($_SESSION['fb_id'])){?>
            <div id="userStatus">
                <img src="../../assets/imgs/user_pics/user_avatar/<?php echo $header_avatar; ?>" class="imgsMenu" id="userAvatar">

                <li id="userArea"><div id="userName"><?php echo $header_nome; ?><span id="seta"><img src="../../assets/imgs/arrow.png" alt=""></span></div>

                    <ul id="userOpts">
                        <li id="menu-anuncios">Meus anúncios</li>
                        <li class="endC" id="plano-pro">Plano PREMIUM</li>
                        <li class="endC" id="menu-cad">Meus dados</li>
                        <li id="menu-sair">Sair</li>
                    </ul>

                </li>
            </div>

            <div id="anunciarBtn">Anunciar</div>


        <?php } else{
            header("Location: ../../index.php");
        }?>



        </div>
    </div>
</div>

<div id="bodyArea">
    <div id="body1-title">Meus Anúncios</div>
    <table id="tabela-anuncios">
        <tr id="title-table">
            <th class="th-table left">Foto</th>
            <th class="th-table">Titulo</th>
            <th class="th-table">Valor</th>
            <th class="th-table right">Status</th>
        </tr>
        
        <?php foreach($sql as $anuncios){ ?>
            <tr>
                <td class="td-table img"><img src="../../assets/imgs/anuncios/<?php echo $anuncios['url']; ?>" alt="" srcset="" height="60px"></td>
                <td class="td-table"><?php echo $anuncios['titulo']; ?></td>
                <td class="td-table"><?php echo $anuncios['valor']; ?></td>
                <td class="td-table">Em análise</td>
            </tr>
        <?php } ?>
    </table>
</div>

<footer id="footer-area">
    <div id="footerInv">
        <div id="container1">
            <table id="footer-items">
                <tr>
                    <td><a href="" class="footer-item-options">Ajuda e <br>contato</a></td>
                    <td><a href="" class="footer-item-options">Dicas de <br>segurança</a></td>
                    <td><a href="" class="footer-item-options">Vender no <br>nqro+</a></td>
                    <td><a href="" class="footer-item-options">Plano profissional</a></td>
                </tr>
            </table>

            <div id="footer-imgs">
                <a href=""> <img src="../../assets/imgs/facebook.png" alt=""> </a>
                <a href=""> <img src="../../assets/imgs/instagram.png" alt=""> </a>
                <a href=""> <img src="../../assets/imgs/github.png" alt=""> </a>
            </div>
        </div>
        
        <div id="span-footer">
            <span>© vBony (Vinicius A. Ferreira), todos os direitos reservados.</span>
        </div>

    </div>
</footer>
</body>
</html>