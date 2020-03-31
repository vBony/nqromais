$( document ).ready(function(){

    $('#cep').mask("99999-999");

    $("#preco").maskMoney({
        prefix: "R$:",
        decimal: ",",
        thousands: "."
    });

    $('#titulo').on('keyup', function(){
        if($( this ).val().length < 3){
            $('.errorArea.titulo').text("Este campo não pode ficar vazio!");
            $( this ).removeClass("inputs").addClass("inputsError");
        }else{
            $('.errorArea.titulo').text("");
            $( this ).removeClass("inputsError").addClass("inputs");
        }
    });

    $('#desc').on('keyup', function(){
        if($( this ).val().length < 7){
            $('.errorArea.desc').text("Este campo não pode ficar vazio e deve conter mais informações");
            $( this ).removeClass("inputs").addClass("inputsError");
        }else{
            $('.errorArea.desc').text("");
            $( this ).removeClass("inputsError").addClass("inputs");
        }
    });

    $('#desc').on('keyup', function(){
        if($( this ).val().length < 7){
            $('.errorArea.desc').text("Este campo não pode ficar vazio e deve conter mais informações");
            $( this ).removeClass("inputs").addClass("inputsError");
        }else{
            $('.errorArea.desc').text("");
            $( this ).removeClass("inputsError").addClass("inputs");
        }
    });

    $('#cep').on('blur', function(){
        var cep = $(this).val();
        console.log(cep);

        $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?", function(dados) {
            if (!("erro" in dados)) {
                $("#cidade").val(dados.localidade);
                $("#estado").val(dados.uf);
                $("#bairro").val(dados.bairro);

                $('.errorArea.cep').text("");
                $('#cep').removeClass("inputsError").addClass("inputs");
            }
            else {
                $('.errorArea.cep').text("CEP não encontrado!");
                $('#cep').removeClass("inputs").addClass("inputsError");
            }
        });
    });


    $('#form').on('submit', function(e){
        var bool = null
        var cidade = $('#cidade').val();
        var estado = $('estado').val();

        if($('#titulo').val().length < 3){
            $('.errorArea.titulo').text("Esse campo não pode ficar vazio e deve conter mais que 3 caracteres!");
            $('#titulo').removeClass('inputs').addClass('inputsError');
            return false;
        }else{
            $('.errorArea.titulo').text("");
            $('#titulo').removeClass('inputsError').addClass('inputs');
            bool = "t";
        }

        if($('#preco').val().length < 3){
            $('.errorArea.titulo').text("Esse campo não pode ficar vazio!");
            $('#preco').removeClass('inputs').addClass('inputsError');
            return false;
        }else{
            $('.errorArea.preco').text("");
            $('#preco').removeClass('inputsError').addClass('inputs');
            bool = "t";
        }

        if($('#desc').val().length < 3){
            $('.errorArea.desc').text("Esse campo não pode ficar vazio e deve contar um breve texto a respeito do produto anunciado!");
            $('#desc').removeClass('inputs').addClass('inputsError');
            return false;
        }else{
            $('.errorArea.desc').text("");
            $('#desc').removeClass('inputsError').addClass('inputs');
            bool = "t";
        }

        if($('#categoria').val() == 0){
            $('.errorArea.categoria').text("Por favor, escolha uma categoria");
            $('#categoria').removeClass('inputs').addClass('inputsError');
            return false;
        }else{
            $('.errorArea.categoria').text("");
            $('#categoria').removeClass('inputsError').addClass('inputs');
            bool = "t";
        }

        if(cidade.length < 1){
            $('.errorArea.cep').text("Digite um CEP válido!");
            $('#cep').removeClass('inputs').addClass('inputsError');
            return false;
        }else{
            $('.errorArea.cep').text("");
            $('#cep').removeClass('inputsError').addClass('inputs');
            bool = "t";
        }

        if(bool == "t"){
        
            e.preventDefault();

            $.ajax({
                url: "requests.php",
                type: "POST",             
                data: new FormData(this), 
                contentType: false,       
                cache: false,             
                processData:false,
                success: function(data){
                    if(data == "max-photos"){
                        $('.errorArea.fotos').html("Você ultrapassou o limite de <strong>6 fotos</strong> por anúncio!")
                        $('#fotos').css("border", "1px solid red");
                    }else if(data == "no-photos"){
                        $('.errorArea.fotos').html("Você não compraria algo sem antes ver o produto, não é mesmo? Então, por favor, nos envie pelo menos <strong>uma foto!</strong>");
                        $('#fotos').css("border", "1px solid red");
                    }else if(data == "done"){
                        window.location.href = "../meus-anuncios/meus-anuncios.php";
                    }else{
                        $('.errorArea.fotos').html("")
                        $('#fotos').css("border", "none");
                    }
                }
            });

        }else{
            return false;
        }
        
    });

    $('#headLogo').on('click', function(){
        window.location.href = '../../index.php#';
    });




});