$(function(){

    $('#areaLogin').on('click', function(){
        window.location.href = "pages/login/login.php";
    });

    $('#userArea').hover(function(){
        $(this).find('ul#userOpts').stop().slideDown('fast');
    },function(){
        $(this).find('ul#userOpts').stop().slideUp('fast');
    });

    $('#anunciarBtn').on('click', function(){
        window.location.href = "pages/anunciar/anunciar.php";
    });

    $('#meusAnunciosArea').on('click', function(){
        window.location.href = "pages/meus-anuncios/meus-anuncios.php";
    });

    $('#menu-anuncios').on('click', function(){
        window.location.href= 'pages/meus-anuncios/meus-anuncios.php';
    });

    $('#menu-sair').on('click', function(){
        window.location.href= 'pages/home/logout.php';
    });

    $('#menu-cad').on('click', function(){
        window.location.href= 'pages/meus-dados/meus-dados.php';
    });

});