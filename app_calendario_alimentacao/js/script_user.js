$(document).ready(() => {
    $('#todos').on('click', () => {
        $('#todos').addClass('ativo');
        $('#alunos').removeClass('ativo');
        $('#funcionarios').removeClass('ativo');
        $('#adm').removeClass('ativo');
        mostrarInformacoes('todos');
    });
    $('#alunos').on('click', () => {
        $('#alunos').addClass('ativo');
        $('#todos').removeClass('ativo');
        $('#funcionarios').removeClass('ativo');
        $('#adm').removeClass('ativo');
        mostrarInformacoes('aluno');
    });
    $('#funcionarios').on('click', () => {
        $('#funcionarios').addClass('ativo');
        $('#alunos').removeClass('ativo');
        $('#todos').removeClass('ativo');
        $('#adm').removeClass('ativo');
        mostrarInformacoes('funcionario');
    });
    $('#adm').on('click', () => {
        $('#adm').addClass('ativo');
        $('#alunos').removeClass('ativo');
        $('#todos').removeClass('ativo');
        $('#funcionarios').removeClass('ativo');
        mostrarInformacoes('adm');
    });

    function mostrarInformacoes(tipoSelecionado) {
        console.log(tipoSelecionado)
        $.ajax({
            type: 'GET',
            url: '../app_calendario_alimentacao/Controller/listUsers.php',
            data: { tipo: tipoSelecionado },
            dataType: 'json',
            success: function(dados) {
                $('#lista-usuarios').empty();
                $.each(dados, function(id, value){
                    var userHtml = `
                        <li class="list-group-item d-flex align-items-center row">
                            <section class="col-9">
                                <h6><strong>${value.nome}</strong></h6>
                                <p>${value.email}</p>
                            </section>
                            <section class="col-3">
                                <h6><strong>${value.autoridade}</strong></h6>
                            </section>
                        </li>`;
                    $('#lista-usuarios').append(userHtml);
                });
            },
            error: function(erro) {
                console.log(erro);
            }
        });
    };

    function verificarLarguraDaPagina() {
        var aviso = $('#aviso');
        var quant = $('.quant-user');
        var text = $('.text-btn');
        var larguraDaPagina = $(window).width();

        if (larguraDaPagina < 1000) {
            quant.css('display', 'none');
            text.css('font-size', '12px')
            if(larguraDaPagina < 550){
                aviso.html(`<article id="avisoMessage" class="bg-warning d-flex justify-content-center">
                                <p class="text-light"><strong>Recomendamos utilizar um tamanho de janela maior.</strong></p>
                            </article>`);
            }else{
                aviso.html('');
            }
        }else {
            quant.css('display', 'block');
            text.css('font-size', '15px');
            
        }
    }
    
    verificarLarguraDaPagina();

    $(window).resize(() => {
        verificarLarguraDaPagina();
    });
});