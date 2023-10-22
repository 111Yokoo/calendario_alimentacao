<?php
require "../../app_calendario_alimentacao/Controller/cardapio.php";
require "../../app_calendario_alimentacao/Controller/conexao.php";
require "../../app_calendario_alimentacao/Controller/cardapio_service.php";

$autoridade = $_GET['autoridade'];

if($_POST['data_inicial'] != '' && $_POST['data_final'] != '' && $_POST['data_dia'] != ''){
    $cardapio = new Cardapio();
    $cardapio->__set('data_inicial', $_POST['data_inicial']);
    $cardapio->__set('data_final', $_POST['data_final']);
    $cardapio->__set('data_dia', $_POST['data_dia']);

    if($_POST['lanche_manha'] != '' || $_POST['almoco'] != '' || $_POST['lanche_tarde'] != ''){
        $cardapio->__set('lanche_manha', $_POST['lanche_manha']);
        $cardapio->__set('lanche_almoco', $_POST['almoco']);
        $cardapio->__set('lanche_tarde', $_POST['lanche_tarde']);

        $conexao = new Conexao();
        $cardapioService = new CardapioService($conexao, $cardapio);

        $diaRepetido = $cardapioService->verificarRepeticaoDeDias($cardapio->__get('data_dia'));

        @$diaRep = $diaRepetido[0]->dia_cardapio;

        if(!isset($diaRep)){
            $cardapioService->adicionarCardapio();
            header('Location: ../cardapioAdd.php?sucesso=sucesso&autoridade='.$autoridade);
        }else{
            header('Location: ../cardapioAdd.php?erro=dia_repetido&autoridade='.$autoridade);
        }
    }else{
        header('Location: ../cardapioAdd.php?erro=faltou_info_cardapio&autoridade='.$autoridade);
    }
}else{
    header('Location: ../cardapioAdd.php?erro=faltou_info_data&autoridade='.$autoridade);
}
?>