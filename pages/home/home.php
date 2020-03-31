<?php
require "config.home.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/imgs/logoAPP.jpg" type="image/jpg" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <style>
        h1{
            color: green;
        }

        table{
            border: none;
            margin: 0px;
            padding: 0px;
        }

        img{
            height: 98px;
            margin-right: 30px
        }

        #content{
            display: flex;
            flex-direction:row;
        }
    </style>
</head>
<body>
    <?php if(isset($_SESSION['id']) && !empty($_SESSION['id']) || isset($_SESSION['fb_id']) && !empty($_SESSION['fb_id'])){?>
    <h1>Usuário Conectado com sucesso!</h1>
    <div id="content">
        <img src="<?php echo $avatar;?>" alt="">
        <table>
            <tr>
                <td><strong>ID: </strong></td>
                <td><span><?php echo $userID;?></span></td>
            </tr>
            <tr>
                <td><strong>Facebook ID: </strong></td>
                <td><span><?php echo $userFBID?></span></td>
            </tr>
            
            <tr>
                <td><strong>Nome: </strong></td>
                <td><span><?php echo $nome; ?></span></td>
            </tr>

            <tr>
                <td><strong>Email: </strong></td>
                <td><span><?php echo $email; ?></span></td>
            </tr>
        </table> 
    </div>
        <a href="logout.php">Sair</a>

    <?php } else{ ?>
        <h2>Usuário não logado</h2>
    <?php } ?>
        
    

    
</body>
</html>