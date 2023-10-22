$(document).ready(() => {
       var data = new Date();

        var diaDaSemana = data.getDay();

        var diasParaSubtrair = diaDaSemana - 1; 
        if (diasParaSubtrair < 0) {
            diasParaSubtrair += 7; 
        }

        var inicioDaSemana = new Date(data);
        inicioDaSemana.setDate(data.getDate() - diasParaSubtrair);

        
        var diaInicio = inicioDaSemana.getDate();
        var mesInicio = inicioDaSemana.getMonth() + 1;
        var anoInicio = inicioDaSemana.getFullYear();

        var dataFormatada = anoInicio + '/' + mesInicio + '/' + diaInicio;

        function mostrarInformacoes(dataFormatada) {
            $.ajax({
                type: 'GET',
                url: '../app_calendario_alimentacao/Controller/cardapioSemanal.php',
                data: { data: dataFormatada },
                dataType: 'json',
                success: function(dados) {
                    console.log(dados);
                    $('#lista-cardapio').empty();
                    $.each(dados, function(id, value){
                        var cardapioHTML = `<article class="cardapio-item">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <h5><strong>Dia: ${value.dia_cardapio}</strong></h5>
                                                        <hr>
                                                        <h5><strong>Café da Manha</strong></h5>
                                                        <p>${value.cardapio_manha}</p>
                                                        <hr>
                                                        <h5><strong>Almoço</strong></h5>
                                                        <p>${value.cardapio_almoco}</p>
                                                        <hr>
                                                        <h5><strong>Café da Tarde</strong></h5>
                                                        <p>${value.cardapio_tarde}</p>
                                                    </li>
                                                </ul>
                                            </article>`;
                        $('#lista-cardapio').append(cardapioHTML);
                    });
                },
                error: function(erro) {
                    console.log(erro);
                }
            });
        };

        mostrarInformacoes(dataFormatada);
});