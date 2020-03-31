<?php 
require "config.meus-dados.php"; 
?>

<!DOCTYPE html5>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../assets/frameworks/jquery-3.4.1.min.js"></script>
    <script src="meus-dados.js"></script>
    <script src="../../assets/frameworks/jquery.mask.min.js"></script>
    <script src="../../assets/frameworks/jquery.maskMoney.min.js"></script>
    <link rel="shortcut icon" href="../../assets/imgs/logoAPP.jpg" type="image/jpg" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="meus-dados.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../footer/footer.css">
    <title>Meus dados | nqro+</title>
</head>

<body>
<header>
    <div id="header">
        <div id="headerInv">
            <div id="headLogo"><p> nqro+ </p></div>
            <a href="../home/logout.php" id="userStatusArea">
                <div id="sairbtn">
                    Olá, <?php echo $nome;?> <span>&times;</span>
                </div>
            </a>
        </div>
    </div>
</header>

    
    <div id="body">
        <div id="main-title">Meus dados</div>
        <div id="session-opts">
            <div id="opt-dados">Meu perfil</div>
            <div id="separator">|</div>
            <div id="opt-senha">Segurança</div>
        </div>
        <div id="user-data-area">
                <div id="avatar_area">
                    <div id="img-user-area"><img src="../../assets/imgs/user_pics/user_avatar/<?php echo $avatar; ?>" id="user-avatar"></div>
                    <div class="editar-btn foto">Mudar foto</div>
                </div>

                <div id="background-change-photo-area">
                    <div id="change-photo-area">
                        <h4>Mudar foto de perfil</h4>

                        <form method="post" id="form-foto" type="image/">
                            <div id="campo-muda-foto">
                                <label for="muda-foto"><img src="../../assets/imgs/photo.png" alt=""><br><h5 id="txtlbl">PNG ou JPG</h5></label>
                                <input type="file" name="foto" id="muda-foto" accept="image/.jpeg,.png,.jpg">
                            </div>

                            <div id="btns-area-foto-form">
                                <input type="submit" id="submit-btn-foto" value="Enviar">
                                <div id="btn-cancelar-foto">Cancelar</div>
                            </div>

                        </form>
                    </div>
                </div>









                <div id="form-area">
                    <div id="name-area">
                        <div id="div-name"><?php echo $nome; ?></div>
                        <form method="post" id="form-nome">

                            <input type="text" name="nome" id="input-nome" value="<?php echo $nome; ?>">
                            <input type="submit" value="Salvar" id="btn-nome">
                            <div class="btn-cancelar nome">Cancelar</div>

                        </form>
                        <div class="editar-btn name">Editar</div>
                    </div>

                    <div class="user-data-area">
                        <div class="icon-area"><img src="../../assets/imgs/email.png"></div>
                        <div id="user-email"><?php echo $email; ?></div>
                        <div class="editar-btn email">Editar email</div>

                        <form method="post" id="form-email">
                                <input type="email" id="input-email" class="form-inputs" value="<?php echo $email; ?>">
                                <input type="submit" value="Salvar" class="btns-submit email">
                                <div class="btns-cancelar email">Cancelar</div>
                        </form>
                    </div>

                    <div class="user-data-area">
                        <div class="icon-area"><img src="../../assets/imgs/phone.png"></div>

                        <?php if($telefone == null){ ?>
                            <div id="user-telefone"><?php echo $telefone; ?></div>
                            <div class="editar-btn telefone">Adicionar número</div>

                            <form method="post" id="form-telefone">
                                <input type="text" id="input-number" class="form-inputs" value="<?php echo $telefone; ?>">
                                <input type="submit" value="Salvar" class="btns-submit number">
                                <div class="btns-cancelar telefone">Cancelar</div>
                            </form>
                        <?php }else{ ?>
                            <div id="user-telefone"><?php echo $telefone; ?></div>
                            <div class="editar-btn telefone">Editar número</div>

                            <form method="post" id="form-telefone">
                                <input type="text" id="input-number" class="form-inputs" value="<?php echo $telefone; ?>">
                                <input type="submit" value="Salvar" class="btns-submit number">
                                <div class="btns-cancelar telefone">Cancelar</div>
                            </form>
                        <?php } ?>
                    </div>

                    <div class="user-data-area">
                        <div class="icon-area"><img src="../../assets/imgs/location.png"></div>
                        <?php if(empty($cidade) || empty($bairro) || empty($estado)) { ?>
                            <div id="user-adress"><?php echo $cidade." - ".$estado.", ".$bairro; ?></div>
                            <div class="editar-btn enderecoAdd">Adicionar endereço</div>

                            <div class="background-window">
                                <div id="window-cep">
                                    <h4>Endereço</h4>
                                    <form method="post" id="form-cep">
                                        <input type="text" name="cep" id="cep" placeholder="CEP" class="cep">
                                        <div id="error-area"></div>

                                        <div id="estado">xx</div>
                                        <div id="cidade">xxxxx</div>
                                        <div id="bairro">xxxxxxxx</div>

                                        <div id="btns-cep-area">
                                            <input type="submit" id="btn-cep" value="Salvar endereço">
                                            <div id="btn-cancel-cep">Cancelar</div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        <?php }else{ ?>
                            <div id="user-adress"><?php echo $cidade." - ".$estado.", ".$bairro; ?></div>
                            <div class="editar-btn endereco">Editar endereço</div>

                            <div class="background-window">
                                <div id="window-cep">
                                    <h4>Endereço</h4>
                                    <form method="post" id="form-cep">
                                        <input type="text" name="cep" id="cep" placeholder="CEP" class="cep">
                                        <div id="error-area"></div>

                                        <div id="estado">xx</div>
                                        <div id="cidade">xxxxx</div>
                                        <div id="bairro">xxxxxxxx</div>

                                        <div id="btns-cep-area">
                                            <input type="submit" id="btn-cep" value="Salvar endereço">
                                            <div id="btn-cancel-cep">Cancelar</div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="user-data-area">
                            <div class="icon-area"><img src="../../assets/imgs/facebook-black.png" alt=""></div>
                            <div id="user-fb-connected">
                                <?php 
                                if($fb_id == null){
                                    echo "Não conectado";
                                }else{
                                    echo "Conectado";
                                }
                                ?>
                            </div>
                    </div>
                </div>

            <div id="error-fixed-window">
                <div id="fixed-error-area">
                    <div id="img-error"><img src="../../assets/imgs/error_signal.png" alt=""></div>
                    <div id="txt-error-area"></div>
                </div>
            </div>
        </div>

        <div id="user-seg-area">
                <div id="area-alterar-senha">
                    <h3>Alterar senha</h3>
                    <p>
                        Escolha uma senha forte que você não esteja usando em nenhum outro lugar.
                        Troque sua senha a cada 8 meses para aumentar a segurança da sua conta.
                    </p>
                    <button id="btn-alterar-senha">Alterar senha</button>
                </div>
        </div>
        
        <div id="background-window-senha">
            <div id="window-alterar-senha">
                <h3>Altere sua senha</h3>
                <p>
                    Crie uma senha longa e complexa, com letras maiúsculas, minúsculas, números e símbolos.
                </p>

                <form method="post" id="form-senha">
                    <?php if($verifica_senha == true){ ?>

                    

                    <?php }else{ ?>

                        <div class="label-senha">Senha atual</div>
                        <input type="password" name="senha_atual" id="input-senha-atual" class="input-senha-atual-default">
                        
                    <?php } ?>

                    <div class="label-senha">Nova senha</div>
                    <input type="password" name="senha_nova" id="input-senha-nova" class="input-senha-nova-default">

                    <div id="error-area-senha" class="error-area-senha-default">8 ou mais caracteres</div>
                    
                    <div id="btn-area-seg">
                        <button type="submit" id="enviar-btn">Enviar</button>
                        <div id="cancelar-btn">Cancelar</div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <?php require "../footer/footer.php"; ?>
    </footer>
</body>
</html>