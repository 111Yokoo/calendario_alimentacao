<?php
require "cardapio.php";
require "conexao.php";
require "cardapio_service.php";

$cardapio = new Cardapio();
$conexao = new Conexao();

$cardapioService = new CardapioService($conexao, $cardapio);

$cardapioDiario = $cardapioService->recuperarCardapio();

@$acao = $_GET['acao'];
@$id = $_GET['id'];
$autoridade = $_GET['autoridade'];
if ($acao == 'remover') {
    $cardapioService->removerCardapio($id);
    header('Location: ../cardapios.php?autoridade='.$autoridade);
}
?>