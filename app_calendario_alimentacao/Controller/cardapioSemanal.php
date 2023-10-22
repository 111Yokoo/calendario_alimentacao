<?php
require "../../app_calendario_alimentacao/Controller/cardapio.php";
require "../../app_calendario_alimentacao/Controller/conexao.php";
require "../../app_calendario_alimentacao/Controller/cardapio_service.php";

$cardapio = new Cardapio();
$conexao = new Conexao();
$cardapioService = new CardapioService($conexao, $cardapio);

if(isset($_GET)){
    $data = $_GET['data'];
    $cardapio = $cardapioService->pegarCardapioSemanal($data);
    echo json_encode($cardapio);
}
?>