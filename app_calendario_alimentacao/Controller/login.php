<?php
require "../../app_calendario_alimentacao/Controller/user.php";
require "../../app_calendario_alimentacao/Controller/conexao.php";
require "../../app_calendario_alimentacao/Controller/user_service.php";

    $acao = $_GET['acao'];

    if($acao == "logar"){
        $user = new User();
        $user->__set('email', $_POST['email']);
        $user->__set('senha', $_POST['senha']);

        $conexao = new Conexao();

        $userService = new UserService($conexao, $user);
        $users = $userService->recuperarUsers();

        $email = $user->__get('email');
        $autoridade = $userService->recuperarAutoridade($email);

        foreach($users as $id => $value){
            if($value->email == $user->__get('email') && $value->senha == $user->__get('senha')){
                header("Location: ../home.php?autoridade=$autoridade");
                break;
            }else{
                header('Location: ../index.php?erro=user_search');
            }
        }
    }else if($acao == 'cadastrar'){
        $user = new User();
        $user->__set('nome', $_POST['nome']);
        $user->__set('email', $_POST['email']);
        $user->__set('senha', $_POST['senha']);

        $conexao = new Conexao();

        $userService = new UserService($conexao, $user);
        $users = $userService->recuperarUsers();

        $usuarioEncontrado = false;
        foreach ($users as $id => $value) {
            if ($user->__get('nome') != '' && $user->__get('email') != '' && $user->__get('senha') != '' && $value->email == $user->__get('email')) {
            $usuarioEncontrado = true;
            break; 
            }
        }   
        if($usuarioEncontrado) {
            header('Location: ../singin.php?erro=user_repeat');
        } else {
            $userService->adicionarUsers();
            header('Location: ../singin.php');
        }
    }

?>

