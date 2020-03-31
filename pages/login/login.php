<?php   
    require "fb.login.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../assets/imgs/logoAPP.jpg" type="image/jpg" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">

    <title>Login | nqro+</title>
</head>
<body>

    <div id="loadingDiv">
        <div class="loader"></div>
    </div>
    <div id="loginAreaBox">
        <div id="LAtitle">NQRO+</div>
        <div id="LAsubTitle">Acesse a sua conta</div>

        <a href="<?php echo htmlspecialchars(urldecode($loginUrl));?>" id="linkFBBTN">

            <div id="FBLoginBtn">
                <img src="../../assets/imgs/facebook_white.png" alt="">
                <div id="FBLBText">Continuar com o Facebook</div>
            </div>

        </a>

        <p id="ou">ou</p>


        

        <form method="post" id="formLogin">
            <div class="inputTitle">Email</div>
            <input type="email" name="email" class="input" id="userEmail">
            <div class="error email"></div>


            <div class="inputTitle">Senha</div>
            <input type="password" name="senha" class="input" id="userPass">
            <div class="error senha"></div>


            <button type="submit" id="btnSubmit">Entrar</button>
        </form>

        <div id="cadastroLink">Não tem uma conta? <a href="../cadastro/cadastro.php">Cadastre-se</a></div>

    </div>

    <div id="TermsAndUses">
        Ao continuar, você concorda com os <a href="#">Termos de 
        Uso</a> e a <a href="#">Política de Privacidade</a> do nquero+,<br> e também,
        em receber comunicações via e-mail e push do nquero+
        e seus parceiros.
    </div>


    
    <script src="../../assets/frameworks/jquery-3.4.1.min.js"></script>
    <script src="login.js"></script>
</body>
</html>