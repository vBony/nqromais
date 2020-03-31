$(function(){
    $('#formCadastro').on('submit', function(e){
        e.preventDefault();

        var userName = $('#userName').val();
        var userEmail = $('#userEmail').val();
        var userPass = $('#userPass').val();

        var status = null;
        if(userName.length < 3){
            $('.status.nome').text("Seu nome deve conter pelomenos 3 caracteres!");
            $('#userName').removeClass('input').addClass('inputFail');
            return;
        }else{
            $('#userName').removeClass('inputFail').addClass('input');
            $('.status.nome').text(" ");
            status = "t";
        }

        if(userEmail.length < 1){
            $('.status.email').text("Email é obrigatorio!");
            $('#userEmail').css("border", "1px solid red");
            return;
        }else{
            status = "t";
        }

        if(userPass.length < 8){
            $('.status.senha').html("Sua senha deve conter pelomenos <strong>8 caracteres</strong>");
            $('#userPass').removeClass('input').addClass('inputFail');
            return;
        }else{
            $('#userPass').removeClass('inputFail').addClass('input');
            $('.status.senha').text("");
            status = "t";
        }

        if(status == "f"){
            return false;
        }else{
            $.ajax({
                type: 'POST',
                data: {nome: userName, email: userEmail, senha: userPass},
                dataType: 'json',
                url: 'config.cadastro.php',
                success: function(json){
                    if(json.status == "done"){
                        $('.input').val("");
                        $('.input').css('border', '1px solid green');
                        $('#btnSubmit').text('Sucesso!, redirecionando ao login em 3 segundos');
                        setInterval(function(){
                            window.location.href = "../login/login.php";
                        }, 3000);
                    }

                    if(json.status == "userEmailExist"){
                        $('.status.email').text("Já existe um usuário registrado utilizando esse email!");
                        $('#userEmail').removeClass('input').addClass('inputFail');
                    }
                }
            });
        }




    });

    $('#userName').on('keyup', function(e){
        this.value = this.value.replace(/[^A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g,'');
    });

    $('#CAtitle').on('click', function(){
        window.location.href = "../../index.php";
    });


});