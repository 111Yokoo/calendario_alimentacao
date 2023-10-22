$(document).ready(() => {
    function verificarLarguraDaPagina() {
        var aviso = $('#aviso');
        var text = $('.text-btn');
        var larguraDaPagina = $(window).width();

        if (larguraDaPagina < 1000) {
            text.css('font-size', '12px')
            if(larguraDaPagina < 990){
                aviso.html(`<article id="avisoMessage" class="bg-warning d-flex justify-content-center">
                                <p class="text-light"><strong>Recomendamos utilizar um tamanho de janela maior.</strong></p>
                            </article>`);
                            verificarLarguraDaPagina();
            }else{
                aviso.html('');
            }
        }else {
            text.css('font-size', '15px');

        }
    }

    verificarLarguraDaPagina();

    $(window).resize(() => {
        verificarLarguraDaPagina();
    });
});