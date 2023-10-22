<?php
require "../app_calendario_alimentacao/Controller/user.php";
require "../app_calendario_alimentacao/Controller/conexao.php";
require "Controller/user_service.php";

$user = new User();
$conexao = new Conexao();
$userService = new UserService($conexao, $user);

$qtdAlunos = $userService->contarUsers('aluno');
$qtdFuncionarios = $userService->contarUsers('funcionario');
$qtdAdm = $userService->contarUsers('adm');
$qtdTotal = $userService->contarUsers('total');

$autoridade = $_GET['autoridade'];

include_once ("Layouts/header.php");
?>
<!--CSS-->
<link rel="stylesheet" href="css/style_app.css">
<!--JS-->
<script src="js/script_user.js"></script>
<!--JS-->

    <a name="nav"></a>
    <section id="aviso"></section>

    <main class="container mt-5" id="user">
        
        <section class="row" id="section-main">
            <article class="col-4 mainarti">
                <ul class="list-group users-separation">
                    <li class="list-group-item d-flex justify-content-between align-items-center text-btn" id="alunos">
                        Alunos
                        <span class="bg-secondary text-light quantidade quant-user">
                        <?php echo $qtdAlunos; ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-btn" id="funcionarios">
                        Professores/funcionários
                        <span class="bg-secondary text-light quantidade quant-user">
                        <?php echo $qtdFuncionarios; ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-btn" id="adm">
                        Administradores
                        <span class="bg-secondary text-light quantidade quant-user">
                        <?php echo $qtdAdm; ?>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-btn" id="todos">
                        Todos
                        <span class="bg-secondary text-light quantidade quant-user">
                        <?php echo $qtdTotal; ?>
                        </span>
                    </li>
                </ul>
            </article>
            <article class="col-8 mainarti">
                <ul class="list-group" id="lista-usuarios">
                </ul>
            </article>
            <section>
                <a href="#nav" class="btn btn-outline-dark btn-cima"><i class="fa-solid fa-arrow-up"></i></a>
            </section>
        </section>
    </main>
</body>
</html>