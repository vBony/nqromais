$( document ).ready(function(){
    $('#userArea').hover(function(){
        $(this).find('ul#userOpts').stop().slideDown('fast');
    },function(){
        $(this).find('ul#userOpts').stop().slideUp('fast');
    });

    $('#anunciarBtn').on('click', function(){
        window.location.href = "pages/anunciar/anunciar.php";
    });

    $('#headerLogo').on('click', function(){
        window.location.href = "../../index.php";
    })

    $('#anunciarBtn').on('click', function(){
        window.location.href = "../anunciar/anunciar.php";
    });

    $('#menu-sair').on('click', function(){
        window.location.href = "../home/logout.php";
    });

    $('#menu-cad').on('click', function(){
        window.location.href= '../meus-dados/meus-dados.php';
    });
});