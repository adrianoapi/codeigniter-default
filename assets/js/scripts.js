function pagTeste() {
    $("#ajax-pagination li a").on("click", function () {
        //alert('oi');
        var URL_pagina = $(this).attr('href').substr(1, 400);
        $.ajax({
            //define o método da requisição
            //method: 'GET',
            //define a url da requisição
            url: URL_pagina,
            type: 'GET',
            //define o tipo de retorno
            dataType: 'html',
            //em caso de sucesso da requisição à url, executa a rotina
            success: function (response) {
                //se retornou algum conteúdo, então exibe dentro da div cujo ID é
                //RegistrosPagina, caso contrário exibe o texto informando que não
                //foram localizados os registros
                if (response) {
                    $('#registros-pagina').html(response);
                } else {
                    $('#registros-pagina').html('<p class="alert alert-info">Nenhum registro localizado.</p>', function () {});
                }
            },
            //em caso de erro, diz que a página não existe
            error: function () {
                $('#registros-pagina').html('<p class="alert alert-info">Página inexistente</p>');
            }
        });

        //bloqueia a abertura da url definida no atributo href do link
        return false;
    });
}
//$(document).ready(function () {
//    //Ao clicar em um link da paginação será executada essa rotina
//    $("#ajax-pagination li a").click(function () {
//
//        //recupera a url do link clicado
//        var URL_pagina = $(this).attr('href').substr(1, 4000);
//        alert(URL_pagina);
//        console.log(URL_pagina);
//        $.ajax({
//            //define o método da requisição
//            //method: 'GET',
//            //define a url da requisição
//            url: URL_pagina,
//            type: 'GET',
//            //define o tipo de retorno
//            dataType: 'html',
//            //em caso de sucesso da requisição à url, executa a rotina
//            success: function (response) {
//                //se retornou algum conteúdo, então exibe dentro da div cujo ID é
//                //RegistrosPagina, caso contrário exibe o texto informando que não
//                //foram localizados os registros
//                if (response) {
//                    $('#RegistrosPagina').html(response);
//                } else {
//                    $('#RegistrosPagina').html('<p class="alert alert-info">Nenhum registro localizado.</p>', function () {});
//                }
//            },
//            //em caso de erro, diz que a página não existe
//            error: function () {
//                $('#RegistrosPagina').html('<p class="alert alert-info">Página inexistente</p>');
//            }
//        });
//
//        //bloqueia a abertura da url definida no atributo href do link
//        return false;
//    });
//});