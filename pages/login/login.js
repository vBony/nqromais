$( document ).ready(function(){

    $('#LAtitle').on('click', function(){
        window.location.href = "../../index.php";
    });

    $('#formLogin').on('submit', function(e){
        e.preventDefault();

        var email = $('#userEmail').val();
        var senha = $('#userPass').val();

        if(email.indexOf('@') == -1 || email.indexOf('.') == -1 ){
            return false;
        }else{
            $.ajax({
                type: 'POST',
                url: 'config.login.php',
                dataType: 'json',
                data: {email: email, senha: senha},
                success: function(json){
                    if(json.status == 'done'){
                        $('.input').attr('disabled', 'disabled');
                        $('#btnSubmit').text('Sucesso!, redirecionando ao login em 3 segundos');
                        setInterval(function(){
                            window.location.href = "../../index.php";
                        }, 3000);
                    }else{
                        $('.input').removeClass('input').addClass('inputFail');
                        $('.error.senha').text('Usuário não encontrado!');
                    }
                },
            });
        }
    });

    $('#userEmail').on('keyup', function(){
        if($('#userEmail').val().indexOf('@') == -1 || $('#userEmail').val().indexOf('.') == -1){
            $(this).removeClass('input').addClass('inputFail');
            $('.error.email').text("Por favor, insira um email válido!");
        }else{
            $(this).removeClass('inputFail').addClass('input');
            $('.error.email').text("");
        }
    });

    $('#loadingDiv').hide();

    $('#FBLoginBtn').on('click', function(){
        $('#loadingDiv').show();
    });




});