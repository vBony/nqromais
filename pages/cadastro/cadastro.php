<?php require "../login/fb.login.php" ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="cadastro.css">
    <link rel="shortcut icon" href="../../assets/imgs/logoAPP.jpg" type="image/jpg" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <title>Minha conta | nqro+</title>
</head>
<body>
    <div id="cadastroAreaBox">
        <div id="CAtitle">NQRO+</div>
        <div id="CAsubTitle">Crie a sua conta. É grátis</div>

        <a href="<?php echo htmlspecialchars(urldecode($loginUrl));?>" id="linkFBBTN">

            <div id="FBLoginBtn">
                <img src="../../assets/imgs/facebook_white.png" alt="">
                <div id="FBLBText">Continuar com o Facebook</div>
            </div>

        </a>

        <p id="ou">ou</p>

        <form method="post" id="formCadastro">
            <div class="titleForInputs">
                <div class="inputTitle">Nome</div>
                <div class="inputSubTitle">Como aparecerá em seus anúncios</div> 
            </div>
            <input type="text" name="nome" class="input" id="userName">
            <div class="status nome"></div>


            <div class="titleForInputs">
                <div class="inputTitle">Email</div>
                <div class="inputSubTitle">Enviaremos um email de confirmação</div> 
            </div>
            <input type="email" name="email" class="input" id="userEmail">
            <div class="status email"></div>


            <div class="titleForInputs">
                <div class="inputTitle">Senha</div>
                <div class="inputSubTitle">Use letra, números e caracteres especiais</div> 
            </div>
            <input type="password" name="email" class="input" id="userPass">
            <div class="status senha"></div>

            <button type="submit" id="btnSubmit">Cadastre-se</button>
        </form>

        <div id="loginLink">Já tem uma conta? <a href="../login/login.php">Entrar</a></div>
    </div>

    <div id="TermsAndUses">
        Ao continuar, você concorda com os <a href="#">Termos de 
        Uso</a> e a <a href="#">Política de Privacidade</a> do nquero+,<br> e também,
        em receber comunicações via e-mail e push do nquero+
        e seus parceiros.
    </div>


    <script src="../../assets/frameworks/jquery-3.4.1.min.js"></script>
    <script src="../../assets/frameworks/jquery.validate.min.js"></script>
    <script src="cadastro.js"></script>
</body>
</html>