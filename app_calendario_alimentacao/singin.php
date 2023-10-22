<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário - Cadastrar</title>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!--CSS-->
    <link rel="stylesheet" href="css/style_login.css">
    <!--JQuery-->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(() => {
            $('#visualisar').on('click', function(event){
                var senha = $('#senha');
                senha.attr('type', senha.attr('type') === 'text' ? 'password' : 'text');
            });
        });
    </script>
</head>
<body id="singin">
    <nav class="nav-bar bg-dark text-light">
        <h1>Calendário de alimentação</h1>
    </nav>
    <?php
                if(isset($_GET['erro']) && $_GET['erro'] == 'user_repeat'){
            ?>
            <article id="erroMessage" class="bg-warning d-flex justify-content-center">
                    <p class="text-light">Usuário já existente, tente logar.</p>
            </article>
            <?php
                }
            ?>
    <main class="container d-flex justify-content-center align-items-center vh-100">
            <section id="container">
                <article class="d-flex justify-content-center bg-dark text-light">
                    <h1>Cadastre-se</h1>
                </article>
                <article class="d-flex justify-content-center form">
                    <form method="post" action="Controller/login.php?acao=cadastrar">
                        <aside class="form-group">
                            <label for="nome">Nome:</label>
                            <br>
                            <input type="text" name="nome" id="nome" placeholder="Nome completo">
                        </aside>
                        <br>
                        <aside class="form-group">
                            <label for="email">Email:</label>
                            <br>
                            <input type="text" name="email" id="email" placeholder="Email">
                        </aside>
                        <br>
                        <aside class="form-group">
                            <label for="senha">Senha:</label>
                            <br>
                            <div class="input-group">
                                <input type="password" name="senha" id="senha" placeholder="Senha" aria-describedby="visualisar">
                                <div class="input-group-append">
                                    <span class="input-group-text btn-password btn btn-outline-dark" id="visualisar"><i class="fa-solid fa-eye"></i></span>
                                </div>
                            </div>
                        </aside>
                        <br><br>
                        <aside class="form-group d-flex flex-row-reverse">
                            <input type="submit" class="btn btn-outline-dark" id="btn-submit-singin" value="Cadastrar">

                            <a href="index.php" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Voltar</a>
                        </aside>
                    </form>
                </article>
        </section>
        
    </main>
</body>
</html>