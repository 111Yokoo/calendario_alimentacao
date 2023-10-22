<?php

require "../../app_calendario_alimentacao/Controller/user.php";
require "../../app_calendario_alimentacao/Controller/conexao.php";
require "../../app_calendario_alimentacao/Controller/user_service.php";

$user = new User();
$conexao = new Conexao();
$userService = new UserService($conexao, $user);

if(isset($_GET)){
    $tipo = $_GET['tipo'];
    if ($tipo == 'alunos') {
        $usuarios = $userService->recuperarUsersEspecificos($tipo);
    } elseif ($tipo == 'funcionarios') {
        $usuarios = $userService->recuperarUsersEspecificos($tipo);
    } elseif ($tipo == 'adm') {
        $usuarios = $userService->recuperarUsersEspecificos($tipo);
    } else {
        $usuarios = $userService->recuperarUsersEspecificos($tipo);
    }
    echo json_encode($usuarios);
}else{
    echo json_encode('Não foi possível encontrar os usuários');
}
?>