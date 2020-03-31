<?php   
include "config.index.php";
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>nqro+ - O melhor site de compras e vendas do Brasil</title>
    <link rel="stylesheet" href="pages/index/index.css">
    <link rel="shortcut icon" href="assets/imgs/logoAPP.jpg" type="image/jpg" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="pages/footer/footer.css">
</head>

<body>

    <div id="headerBackground">
        <div id="headerInv">
            <div id="headerLogo">NQRO+</div>
            <div id="headerMenuArea">

            <?php if(isset($_SESSION['id']) && !empty($_SESSION['id']) || isset($_SESSION['fb_id']) && !empty($_SESSION['fb_id'])){?>
                
                <div id="meusAnunciosArea">
                    <img src="assets/imgs/megaphone-grey.png" class="imgsMenu" id="megaphone">
                    <div id="meusAnunciosText">Meus anúncios</div>
                </div>
                <div id="userStatus">
                    <img src="assets/imgs/user_pics/user_avatar/<?php echo $avatar; ?>" class="imgsMenu" id="userAvatar">

                    <li id="userArea"><div id="userName"><?php echo $nome; ?><span id="seta"><img src="assets/imgs/arrow.png" alt=""></span></div>

                        <ul id="userOpts">
                            <li id="menu-anuncios">Meus anúncios</li>
                            <li class="endC" id="plano-pro">Plano PREMIUM</li>
                            <li class="endC" id="menu-cad">Meus dados</li>
                            <li id="menu-sair">Sair</li>
                        </ul>

                    </li>
                </div>

                <div id="anunciarBtn">Anunciar</div>


            <?php } else{ ?>

                <div id="meusAnunciosArea">
                    <img src="assets/imgs/megaphone-grey.png" class="imgsMenu">
                    <div id="meusAnunciosText">Meus anúncios</div>
                </div>

                <div id="areaLogin">
                    <img src="assets/imgs/user-icon-grey.png" class="imgsMenu" id="userLogin">
                    <div id="userName">Entrar</div>
                </div>

                <div id="anunciarBtn"><p>Anunciar</p></div>

            <?php } ?>

            </div>
        </div>
    </div>

<div id="all">

    





    <div id="bodyArea">
        <div id="seuEstadoArea">
            <div id="estadoTitleArea">
                <div id="estadoImgDiv"><img id="estadoIcon" src="assets/imgs/pin.png" alt=""></div>
                <div class="globalTitle Estado">Escolha o seu estado:</div><br>
            </div>

            <div id="estadoContainerOpts">
                <a href="" class="Eopts">RJ</a>
                <a href="" class="Eopts">SP</a>
                <a href="" class="Eopts">MG</a>
                <a href="" class="Eopts">PR</a>
                <a href="" class="Eopts">RS</a>
                <a href="" class="Eopts">SC</a>
                <a href="" class="Eopts">ES</a>
                <a href="" class="Eopts">BA</a>
                <a href="" class="Eopts">PE</a>
                <a href="" class="Eopts">DF</a>
                <a href="" class="Eopts">CE</a>
                <a href="" class="Eopts">MS</a>
                <a href="" class="Eopts">GO</a>
                <a href="" class="Eopts">AM</a>
                <a href="" class="Eopts">RN</a>
                <a href="" class="Eopts">PB</a>
                <a href="" class="Eopts">PA</a>
                <a href="" class="Eopts">MT</a>
                <a href="" class="Eopts">AL</a>
                <a href="" class="Eopts">SE</a>
                <a href="" class="Eopts">MA</a>
                <a href="" class="Eopts">AC</a>
                <a href="" class="Eopts">RO</a>
                <a href="" class="Eopts">TO</a>
                <a href="" class="Eopts">PI</a>
                <a href="" class="Eopts">AP</a>
                <a href="" class="Eopts">RR</a>
                <a href="" class="Eopts">BRASIL</a>
            </div>
        </div>








        <div id="anunciosRecentesArea">
            <div class="globalTitle AR">Anúncios Recentes</div>

            <div id="areaAR">

                <a href="">
                    <div class="anuncioRecente" id="prodN">
                        <img src="assets/imgs/img-exemplo.jpg" alt="" class="imgAnuncio" id="imgN">
                        <div class="nameAnuncio" id="nameN">Nome de Exemplo</div>
                        <div class="precoAnuncio" id="precoN"><span>R$</span>99999</div>
                    </div>
                </a>        

            </div>

        </div>

    </div>

</div>

<div id="footerArea">
        <div id="contentFooterArea">
            <div id="col1Footer">
                <a href="">Ajuda e <br> contato</a>
                <a href="">Dicas de<br> segurança</a>
                <a href="">Vender no<br> nquero+</a>
                <a href="">Plano<br> Profissional</a>
            </div>

            <div id="col2Footer">
                <a href=""><img src="pages/footer/img/facebook.png" alt=""></a>
                <a href=""><img src="pages/footer/img/instagram.png" alt=""></a>
                <a href=""><img src="pages/footer/img/github.png" alt=""></a>
            </div>

            <div id="personalData">
                <span>&#169; Vinicius de Assis Ferreira, Senador Canedo - GO</span>
            </div>
        </div>
</div>





<script src="assets/frameworks/jquery-3.4.1.min.js"></script>
<script src="pages/index/index.js"></script>
</body>
</html>