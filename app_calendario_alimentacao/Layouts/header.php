<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="css/style_header.css">
    <!--JS-->
    <script src="js/script_all.js"></script>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark d-flex p-2">
        <a href="home.php?autoridade=<?= $autoridade ?>" class="navbar-brand" id="titulo">
            <h1>Calendário de alimentação</h1>
        </a>
        <button class="navbar-toggler" id="btn-nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <section class="navbar-collapse collapse" id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item m-1">
                    <a href="home.php?autoridade=<?= $autoridade ?>" class="nav-link">Cardápio</a>
                </li>
                <?php
                    if($autoridade == 'funcionario' || $autoridade == 'adm'){
                ?>
                <li class="nav-item m-1">
                    <a href="cardapioAdd.php?autoridade=<?= $autoridade ?>" class="nav-link">Adicionar cardápio</a>
                </li>
                <li class="nav-item m-1">
                    <a href="cardapios.php?autoridade=<?= $autoridade ?>" class="nav-link">Lista de Cardápios</a>
                </li>
                <?php
                    }
                    if($autoridade == 'adm'){
                ?>
                <li class="nav-item m-1">
                    <a href="users.php?autoridade=<?= $autoridade ?>" class="nav-link">Usuários</a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </section>
        <section>
            <a href="index.php" class="btn btn-outline-secondary"><i class="fa-solid fa-door-open"></i></a>
        </section>
    </nav> 