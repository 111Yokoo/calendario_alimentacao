$(document).ready(() => {

    function verificarLarguraDaPagina() {
        var navbarNav = $('#navbarNav');
        var larguraDaPagina = $(window).width();

        if (larguraDaPagina < 1000) {
            navbarNav.css('display', 'none');
        } else {
            navbarNav.css('display', 'block');
        }
    }
    
    verificarLarguraDaPagina();

    $(window).resize(() => {
        verificarLarguraDaPagina();
    });

    $('#btn-nav').on('click', () => {
        var navbarNav = $('#navbarNav');
        
        if (navbarNav.css('display') === 'none') {
            navbarNav.css('display', 'block');
        } else {
            navbarNav.css('display', 'none');
        }
    });
});