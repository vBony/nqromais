$( document ).ready( function(){
    $('#form-nome').hide();
    $('#form-email').hide();
    $('#form-telefone').hide();
    $('.background-window').hide();
    $('#error-fixed-window').hide();
    $('#background-change-photo-area').hide();
    $('#user-seg-area').hide();
    $('#background-window-senha').hide();

    $('#userStatusArea').on('click', function(){
        window.location.href = '../home/logout.php';
    });

    $('#headLogo').on('click', function(){
        window.location.href = '../../index.php';
    });

    $('#telefone').mask( '(00) 0.0000-0000' );
    $('#cep').mask('00000-000');


    var cep_global;
    var uf_global;
    var localidade_global;
    var bairro_global;
    $('#cep').keyup( function(){
        var cep = $(this).val();
        if(cep.length == 9){
            $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(dados) {
                if (!("erro" in dados)) {
                    $("#cidade").text(dados.localidade);
                    $("#estado").text(dados.uf);
                    $("#bairro").text(dados.bairro);

                    $('#error-area').text("");
                    $('#cep').removeClass("cep-error").addClass("cep");

                    cep_global = cep;
                    uf_global = dados.uf;
                    localidade_global = dados.localidade;
                    bairro_global = dados.bairro;
                }
                else {
                    $('#error-area').text("CEP não encontrado!");
                    $('#cep').removeClass("cep").addClass("cep-error");
                }
            });
        }

    });

    $('#form-cep').on('submit', function(e){
        e.preventDefault();

        var cep = $('#cep').val();

        if(cep.length == null || cep.length < 9){
            $('#error-area').text("Digite um CEP válido!");
            $('#cep').removeClass("cep").addClass("cep-error");
            return false;
        }else{
            $.ajax({
                url: 'requests.meus-dados.php',
                type: 'POST',
                dataType: 'json',
                data: {cep: cep_global, uf: uf_global, localidade: localidade_global, bairro: bairro_global},
                success: function(json){
                    if(json == 'error'){
                    }else{
                        console.log(json.uf);
                        $('#user-adress').text(json.localidade+" - "+json.uf+", "+json.bairro);
                        $('.background-window').fadeOut('fast');
                    }
                }
            });
        }
    });

    

    $('#nome').on('keyup', function(){
        if($( this ).val().length < 3){
            $('.input-error-area.nome').text("Por favor, digite um nome válido!");
            $( this ).removeClass("inputs").addClass("inputs-error");
        }else{
            $('.input-error-area.nome').text("");
            $( this ).removeClass("inputs-error").addClass("inputs");
        }
    });

    $('#email').on('keyup', function(){
        if($(this).val().indexOf('@') == -1 || $(this).val().indexOf('.') == -1){
            $('.input-error-area.email').text("Por favor, digite um email válido!");
            $( this ).removeClass("inputs").addClass("inputs-error");
        }else{
            $('.input-error-area.email').text("");
            $( this ).removeClass("inputs-error").addClass("inputs");
        }
    });

    // Form Nome
    $('.editar-btn.name').on('click', function(){
        $('#div-name').hide();
        $( this ).hide();

        $('#form-nome').show();
    });

    $('.btn-cancelar.nome').on('click', function(){
        $('#form-nome').hide();

        $('#div-name').show();
        $('.editar-btn.name').show();
    });

    $('#input-nome').on('keyup', function(e){
        this.value = this.value.replace(/[^A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]/g,'');
    });

    $('#form-nome').on('submit', function(e){
        e.preventDefault();

        var nome = $('#input-nome').val();
        if(nome.length < 3){
            $('#txt-error-area').text("Digite um nome válido!");
            setInterval(function(){
                $('#error-fixed-window').slideUp('fast');
            }, 3000)
                $('#error-fixed-window').slideDown('fast');
            return false;
        }else{
            $.ajax({
                url: 'requests.meus-dados.php',
                type: 'POST',
                dataType: 'json',
                data: {nome: nome},
                success: function(json){
                    $('#div-name').html(json.nome);
                    $('#div-name').show();

                    $('#form-nome').hide();
                    $('.editar-btn.name').show();

                    $("#sairbtn").text("Olá, "+json.nome);
                }

            })
        }
    });



    // Form Email
    $('.editar-btn.email').on('click', function(){
        $('#user-email').hide();
        $( this ).hide();

        $('#form-email').show();
    });

    $('.btns-cancelar.email').on('click', function(){
        $('#form-email').hide();

        $('#user-email').show();
        $('.editar-btn.email').show();
    });

    $('#form-email').on('submit', function(e){
        e.preventDefault();
        var email = $('#input-email').val();

        if(email.indexOf('@') == -1 || email.indexOf('.') == -1 || email.length < 8){
            $('#txt-error-area').text("Digite um email válido!");
            setInterval(function(){
                $('#error-fixed-window').slideUp('fast');
            }, 3000)
                $('#error-fixed-window').slideDown('fast');
            return false;
        }else{
            $.ajax({
                url: 'requests.meus-dados.php',
                type: 'POST',
                data: {email: email},
                dataType: 'json',
                success: function(json){
                    if(json.email == 'exist'){
                        $('#txt-error-area').text("Este email já está em uso!");
                        setInterval(function(){
                            $('#error-fixed-window').slideUp('fast');
                        }, 3000)
                            $('#error-fixed-window').slideDown('fast');
                        return false;
                    }else{
                        $('#user-email').html(json.email);
                        $('#user-email').show();

                        $('#form-email').hide();
                        $('.editar-btn.email').show();
                    }
                }

            });
        }
    });



    // Form Telefone
    $('#input-number').mask('(99) 99999-9999');

    $('.editar-btn.telefone').on('click', function(){
        $('#user-telefone').hide();
        $( this ).hide();

        $('#form-telefone').show();
    });

    $('.btns-cancelar.telefone').on('click', function(){
        $('#form-telefone').hide();

        $('#user-telefone').show();
        $('.editar-btn.telefone').show();
    });

    $('#form-telefone').on('submit', function(e){
        e.preventDefault();
        var telefone = $('#input-number').val();

        if(telefone.length != 15){
            $('#txt-error-area').text("Digite um número válido!");

            setInterval(function(){
                $('#error-fixed-window').slideUp('fast');
            }, 3000);

            $('#error-fixed-window').slideDown('fast');

            
            return false;
        }else{
            $.ajax({
                url: 'requests.meus-dados.php',
                type: 'POST',
                dataType: 'json',
                data: {telefone: telefone},
                success: function(json){
                    $('#user-telefone').html(json.telefone);
                    $('#user-telefone').show();

                    $('#form-telefone').hide();
                    $('.editar-btn.telefone').show();
                }

            })
        }
        
    });



    // Form Cep
    $('.editar-btn.endereco').on('click', function(){
        $('.background-window').fadeIn('fast');
    });

    $('#btn-cancel-cep').on('click', function(){
        $('.background-window').fadeOut('fast');
    });

    $('.editar-btn.endereco').on('click', function(){
        $('#cep').focus();
    });

    //From cep FB
    $('.editar-btn.enderecoAdd').on('click', function(){
        $('.background-window').fadeIn('fast');
    });

    $('#btn-cancel-cep').on('click', function(){
        $('.background-window').fadeOut('fast');
    });

    $('.editar-btn.enderecoAdd').on('click', function(){
        $('#cep').focus();
    });







    //Form Fotos
    $('.editar-btn.foto').on('click', function(){
        $('#background-change-photo-area').fadeIn('fast');
    });

    $('#btn-cancelar-foto').on('click', function(){
        $('#background-change-photo-area').fadeOut('fast');
    });

    $('#form-foto').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url: "requests.meus-dados.php",
            type: "POST",             
            data: new FormData(this), 
            contentType: false,       
            cache: false,             
            processData:false,
            success: function(data){
                if(data == 'done'){
                    $('#background-change-photo-area').fadeOut('fast');
                    location.reload();
                }

                if(data == 'no-img'){
                    $('#txt-error-area').text("Formato de imagem inválido!");

                    setInterval(function(){
                        $('#error-fixed-window').slideUp('fast');
                    }, 3000);

                    $('#error-fixed-window').slideDown('fast');
                }
            }
        });
    });

    $('#opt-senha').on('click', function(){
        $( this ).css('text-decoration', 'underline');
        $('#opt-dados').css('text-decoration', 'none');

        $('#user-data-area').hide();
        $('#user-seg-area').show();
    });

    $('#opt-dados').on('click', function(){
        $( this ).css('text-decoration', 'underline');
        $('#opt-senha').css('text-decoration', 'none');

        $('#user-seg-area').hide();
        $('#user-data-area').show();
    });

    $('#btn-alterar-senha').on('click', function(){
        $('#background-window-senha').fadeIn('fast');
    });

    $('#cancelar-btn').on('click', function(){
        $('#background-window-senha').fadeOut('fast');
    });

    $('#form-senha').on('submit', function(e){
        e.preventDefault();

        var senhaAtual = $('#input-senha-atual').val();
        var senhaNova = $('#input-senha-nova').val();

        if(senhaNova.length < 8){
            $('#error-area-senha').removeClass('error-area-senha-suceess');
            $('#error-area-senha').addClass('error-area-senha-default');

            $('#input-senha-nova').removeClass('input-senha-nova-default');
            $('#input-senha-nova').addClass('input-senha-nova-error');
            $('#error-area-senha').text('Por favor, digite uma senha com mais de 8 caracteres, incluindo letras maiusculas e símbolos!');
            return false;
        }else{
            $.ajax({
                url: 'requests.meus-dados.php',
                type: 'POST',
                dataType: 'json',
                data: {senha_atual: senhaAtual, nova_senha: senhaNova},
                success: function(json){
                    if(json.senha_response == 'changed'){
                        $('#input-senha-nova').removeClass('input-senha-nova-error');
                        $('#input-senha-nova').addClass('input-senha-nova-default');

                        $('#input-senha-atual').removeClass('input-senha-atual-error');
                        $('#input-senha-atual').addClass('input-senha-atual-default');

                        $('#error-area-senha').removeClass('error-area-senha-default');
                        $('#error-area-senha').addClass('error-area-senha-success');
                        $('#error-area-senha').text('Senha alterada com sucesso!');
                        setInterval(function(){
                            $('#background-window-senha').fadeOut('fast');
                            location.reload();
                        }, 2000);
                    }else if(json.senha_response == 'senha_atual_invalida'){
                        $('#input-senha-atual').removeClass('input-senha-atual-default');
                        $('#input-senha-atual').addClass('input-senha-atual-error');

                        $('#error-area-senha').removeClass('error-area-senha-suceess');
                        $('#error-area-senha').addClass('error-area-senha-default');
                        $('#error-area-senha').text("Senha atual incorreta!");
                    }
                }
            })

        }

        
    });
});