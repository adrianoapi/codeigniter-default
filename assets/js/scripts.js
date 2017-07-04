function pagTeste() {
    $("#ajax-pagination li a").on("click", function () {
        var URL_pagina = $(this).attr('href').substr(1, $(this).attr('href').length);
        $.ajax({
            url: URL_pagina,
            type: 'GET',
            //define o tipo de retorno
            dataType: 'html',
            success: function (response) {
                if (response) {
                    $('#registros-pagina').html(response);
                } else {
                    $('#registros-pagina').html('<p class="alert alert-info">Nenhum registro localizado.</p>', function () {});
                }
            },
            error: function () {
                $('#registros-pagina').html('<p class="alert alert-info">Página inexistente</p>');
            }
        });

        //bloqueia a abertura da url definida no atributo href do link
        return false;
    });
}